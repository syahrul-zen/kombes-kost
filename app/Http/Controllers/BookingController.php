<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

// require base_path('vendor/setasign/fpdf/fpdf.php');

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Booking.index', [
            'bookings' => Booking::with('member', 'room')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('Admin.Booking.detail', [
            'booking' => $booking->load('member', 'room'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function prevBooking(Room $room)
    {

        return view('Member.booking', [
            'room' => $room->load('booking.member'),
        ]);
    }

    public function booking(Request $request)
    {

        $data = $request->all();

        if ($request->paket_sewa == 'Pilih') {
            return back()->with('error', 'Paket sewa harus dipilih terlebih dahulu.')->withInput();
        }

        if (! $request->start_date) {
            return back()->with('error', 'Tanggal mulai sewa harus diisi terlebih dahulu.')->withInput();
        }

        $request->validate([
            'start_date' => 'required',
            'paket_sewa' => 'required',
            'harga_per_3_bulan' => 'required',
            'member_id' => 'required',
            'room_id' => ['required', 'exists:rooms,id',
                function ($attribute, $value, $fail) use ($data) {

                    $lamaSewa = ' '.($data['paket_sewa'] * 30).' days';

                    $endDate = date('Y-m-d', strtotime($data['start_date'].$lamaSewa));

                    $tabrakan = Booking::where('room_id', $data['room_id'])
                        ->where('start_date', '<=', $endDate)
                        ->where('end_date', '>=', $data['start_date'])
                        ->count();

                    if ($tabrakan > 0) {
                        $fail('Jadwal anda '.date('d-M-Y', strtotime($data['start_date'])).' Hingga '.date('d-M-Y', strtotime($endDate)).', bertabrakan dengan jadwal pesanan lain, periksa kembali jadwal yang ada dibawah!');
                    }
                },
            ],
        ]);

        $validated['start_date'] = $request['start_date'];

        $lamaSewa = ' '.($request['paket_sewa'] * 30).' days';

        $validated['end_date'] = date('Y-m-d', strtotime($validated['start_date'].$lamaSewa));

        $validated['room_id'] = $request['room_id'];
        $validated['member_id'] = $request['member_id'];
        $validated['total_harga'] = ($request->paket_sewa / 3) * $request['harga_per_3_bulan'];

        $booking = Booking::create($validated);

        return redirect('detail/'.$booking->id)->with('success', 'Kamar berhasil dipesan, silakan lakukan pembayaran dan unggah bukti pembayaran untuk konfirmasi.');
    }

    public function detail(Booking $booking)
    {

        return view('Member.detail', [
            'booking' => $booking->load('room', 'member'),
        ]);
    }

    public function uploadPembayaran(Request $request, Booking $booking)
    {

        $request->validate([
            'bukti_pembayaran' => 'required|image|max:2048',
        ]);

        $file = $request->file('bukti_pembayaran');

        $renameFile = uniqid().'_'.$file->getClientOriginalName();
        $locationFile = 'File';
        $file->move($locationFile, $renameFile);

        if ($booking->bukti_pembayaran) {
            File::delete('File/'.$booking->bukti_pembayaran);
        }

        $booking->bukti_pembayaran = $renameFile;

        $booking->save();

        return back()->with('success', 'Bukti pembayaran berhasil diunggah. Silakan tunggu konfirmasi dari admin.');
    }

    public function setStatusPembayaran(Request $request, Booking $booking)
    {

        $validated = $request->validate([
            'status_pembayaran' => 'required|in:pending,success',
        ]);

        $booking->status_pembayaran = $validated['status_pembayaran'];
        $booking->save();

        return back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }

    public function setStatusPemesanan(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status_booking' => 'required|in:pending,confirmed,check_in,check_out',
        ]);

        $booking->status_booking = $validated['status_booking'];
        $booking->save();

        return back()->with('success', 'Status booking berhasil diperbarui.');
    }

    public function laporan(Request $request)
    {

        $data = Booking::with('room', 'member')->whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])->get();

        // return $data;
        $dummyBookings = [
            [
                'member_name' => 'Budi Setiawan',
                'room_name' => 'Kamar 101 (Premium)',
                'start_date' => '2025-01-15',
                'end_date' => '2025-04-15',
                'payment_status' => 'Confirmed',
                'status_booking' => 'Check_in',
                'total_price' => 4500000.00,
                'created_at' => '2024-12-01 10:30:00', // <-- DATA BARU
            ],
            [
                'member_name' => 'Ani Lestari',
                'room_name' => 'Kamar 203 (Standar)',
                'start_date' => '2025-03-01',
                'end_date' => '2025-09-01',
                'payment_status' => 'Pending',
                'status_booking' => 'Pending',
                'total_price' => 7200000.00,
                'created_at' => '2025-02-25 15:45:00', // <-- DATA BARU
            ],
            [
                'member_name' => 'Joko Susilo',
                'room_name' => 'Kamar 105 (Reguler)',
                'start_date' => '2024-12-01',
                'end_date' => '2025-01-01',
                'payment_status' => 'Confirmed',
                'status_booking' => 'Check_out',
                'total_price' => 1200000.00,
                'created_at' => '2024-11-28 09:00:00', // <-- DATA BARU
            ],
            [
                'member_name' => 'Siti Aisyah',
                'room_name' => 'Kamar 302 (Deluxe)',
                'start_date' => '2025-05-20',
                'end_date' => '2026-05-20',
                'payment_status' => 'Confirmed',
                'status_booking' => 'Confirmed',
                'total_price' => 15000000.00,
                'created_at' => '2025-05-15 11:15:00', // <-- DATA BARU
            ],
        ];

        // ----------------------------------------------------
        // 2. INISIASI FPDF dan Pengaturan Halaman
        // ----------------------------------------------------
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AddPage();
        $lebar_halaman = 297;

        // Data header :
        $tanggal = date('d F Y', strtotime($request->tanggal_awal)).' s/d '.date('d F Y', strtotime($request->tanggal_akhir));

        // ... (HEADER LAPORAN tetap sama) ...
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell($lebar_halaman, 7, 'LAPORAN DATA BOOKING KAMAR KOS', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell($lebar_halaman, 5, 'Per Tanggal: '.$tanggal, 0, 1, 'C');
        $pdf->Cell($lebar_halaman, 5, '', 0, 1);

        // ----------------------------------------------------
        // 3. HITUNG POSISI DAN HEADER KOLOM (Pemusatan Tabel)
        // ----------------------------------------------------

        // Tambah kolom 'Tgl Pesan' (25 mm)
        // Lebar kolom baru: 5(No.) + 40(Nama) + 40(Kamar) + 25(Tgl Pesan) + 25(Mulai) + 25(Akhir) + 30(Bayar) + 30(Booking) + 30(Harga) = 250 mm
        $lebar_kolom = [7, 40, 40, 25, 25, 25, 30, 30, 30];
        $header_text = ['No.', 'Nama Penyewa', 'Nama Kamar', 'Tgl Pesan', 'Tgl Mulai', 'Tgl Akhir', 'Status Bayar', 'Status Booking', 'Total Harga'];

        $total_lebar_tabel = array_sum($lebar_kolom); // 250 mm
        $margin_kiri = ($lebar_halaman - $total_lebar_tabel) / 2; // (297 - 250) / 2 = 23.5 mm

        // Tampilan Header
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->SetFillColor(200, 220, 255);
        $pdf->SetX($margin_kiri);

        for ($i = 0; $i < count($header_text); $i++) {
            $pdf->Cell($lebar_kolom[$i], 8, $header_text[$i], 1, 0, 'C', true);
        }
        $pdf->Ln();

        // ----------------------------------------------------
        // 4. ISI TABEL DATA (Loop Dummy Data)
        // ----------------------------------------------------
        $pdf->SetFont('Arial', '', 9);
        $total_semua_harga = 0;
        $row_count = 0;
        $nomor_urut = 0;

        foreach ($data as $booking) {
            $nomor_urut++;

            $fill = $row_count % 2 == 0 ? false : true;
            $row_count++;

            $harga_rp = 'Rp '.number_format($booking['total_harga'], 0, ',', '.');

            if ($booking['status_pembayaran'] != 'pending') {
                $total_semua_harga += $booking['total_harga'];

            }

            $pdf->SetX($margin_kiri); // ATUR POSISI X KE TENGAH

            // 1. Kolom Nomor Urut
            $pdf->Cell($lebar_kolom[0], 6, $nomor_urut, 1, 0, 'C', $fill);

            // Nama dan kamar :
            $nama_penyewa = $booking->member->nama_lengkap;
            $nama_kamar = $booking->room->nama.' (Tipe: '.$booking->room->tipe.')';
            $tanggal_pesan = date('d-m-Y', strtotime($booking['created_at']));

            // 2. Data Utama
            $pdf->Cell($lebar_kolom[1], 6, $nama_penyewa, 1, 0, 'L', $fill);
            $pdf->Cell($lebar_kolom[2], 6, $nama_kamar, 1, 0, 'L', $fill);

            // 3. Kolom TGL PESAN BARU
            $pdf->Cell($lebar_kolom[3], 6, $tanggal_pesan, 1, 0, 'C', $fill);

            // 4. Kolom lainnya (Perhatikan perubahan indeks)
            $pdf->Cell($lebar_kolom[4], 6, Carbon::parse($booking['start_date'])->format('d-m-Y'), 1, 0, 'C', $fill);
            $pdf->Cell($lebar_kolom[5], 6, Carbon::parse($booking['end_date'])->format('d-m-Y'), 1, 0, 'C', $fill);

            if ($booking['status_pembayaran'] == 'pending') {
                $pdf->SetTextColor(255, 0, 0); // Merah untuk pending
            }

            $pdf->Cell($lebar_kolom[6], 6, $booking['status_pembayaran'], 1, 0, 'C', $fill);

            $pdf->SetTextColor(0, 0, 0); // Hitam untuk lainnya

            $pdf->Cell($lebar_kolom[7], 6, $booking['status_booking'], 1, 0, 'C', $fill);
            $pdf->Cell($lebar_kolom[8], 6, $harga_rp, 1, 0, 'R', $fill);

            $pdf->Ln();
        }

        // ----------------------------------------------------
        // 5. FOOTER LAPORAN (Total Keseluruhan)
        // ----------------------------------------------------
        $pdf->SetFont('Arial', 'B', 10);

        $pdf->SetX($margin_kiri);

        // Total lebar gabungan kolom selain harga: 5+40+40+25+25+25+30+30 = 215 mm
        $pdf->Cell(222, 7, 'TOTAL PENDAPATAN', 1, 0, 'R', true); // Lebar digabung 215 mm
        $pdf->Cell(30, 7, 'Rp '.number_format($total_semua_harga, 0, ',', '.'), 1, 1, 'R', true);

        // ----------------------------------------------------
        // 6. OUTPUT PDF
        // ----------------------------------------------------
        $pdf->Output('I', 'Laporan_Booking_Updated_'.date('Ymd_His').'.pdf');
        exit;
    }
}
