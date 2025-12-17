@extends("Admin.Layouts.main")

@section("container")
    <div class="col-12">
        <h4 class="mb-2"><i class="bi bi-house-door"></i> Jadwal Kamar</h4>

        {{-- Session Message --}}
        @if (session()->has("success"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session("success") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="bg-light rounded p-4">
            <div class="table-responsive">
                <table class="table-hover table" style="color:black">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Periode Booking</th>
                            <th>Total Harga</th>
                            <th>Status Booking</th>
                            <th>Status Pembayaran</th>
                            <th>Member</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($calendar as $bulan => $bookingList)
                            @php
                                $label = \Carbon\Carbon::createFromFormat("Y-m", $bulan);
                            @endphp

                            <tr class="table-secondary">
                                <td colspan="6">
                                    <strong>{{ $label->translatedFormat("F Y") }}</strong>
                                </td>
                            </tr>

                            @forelse ($bookingList as $booking)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ date("d M Y", strtotime($booking->start_date)) }}
                                        –
                                        {{ date("d M Y", strtotime($booking->end_date)) }}
                                    </td>
                                    <td>Rp {{ number_format($booking->total_harga, 0, ",", ".") }}</td>
                                    <td><span
                                            class="badge rounded-pill {{ $booking->status_booking == "pending"
                                                ? "bg-warning text-dark"
                                                : ($booking->status_booking == "confirmed"
                                                    ? "bg-success"
                                                    : ($booking->status_booking == "check_in"
                                                        ? "bg-primary"
                                                        : ($booking->status_booking == "check_out"
                                                            ? "bg-secondary"
                                                            : "bg-info"))) }}">{{ $booking->status_booking }}</span>
                                    </td>
                                    <td><span
                                            class="badge rounded-pill {{ $booking->status_pembayaran == "pending" ? "bg-warning" : "bg-success" }} text-white">{{ $booking->status_pembayaran }}
                                    </td>
                                    <td>{{ $booking->member->nama_lengkap }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-muted text-center">
                                        Tidak ada booking
                                    </td>
                                </tr>
                            @endforelse
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>

    </div>
@endsection
