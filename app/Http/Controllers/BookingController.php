<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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

        $booking->bukti_pembayaran = $renameFile;

        $booking->save();

        return back()->with('success', 'Bukti pembayaran berhasil diunggah. Silakan tunggu konfirmasi dari admin.');
    }
}
