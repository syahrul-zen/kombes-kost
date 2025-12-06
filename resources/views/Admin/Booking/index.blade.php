@extends("Admin.Layouts.main")

@section("container")
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cetak Laporan Booking</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url("laporan") }}" method="POST">
                    <div class="modal-body">

                        @csrf
                        <div class="d-flex justify-content-around">
                            <input type="date" name="tanggal_awal" required>
                            <input type="date" name="tanggal_akhir" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12">
        <h4 class="mb-2"><i class="bi bi-key-fill"></i> Daftar Booking</h4>

        {{-- Session Message --}}
        @if (session()->has("success"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session("success") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="bg-light rounded p-4">
            <div class="table-responsive">
                <table class="table-hover table" id="daftar_kamar" style="color:black">

                    <div class="d-flex justify-content-between">
                        <div class="d-flex gap-3">
                            {{-- Mengubah URL ke endpoint pembuatan kamar --}}
                            {{-- <a href="{{ url('room/create') }} " class="btn btn-primary mb-3"><i
                                    class="bi bi-plus-circle me-2"></i>Tambah Kamar</a> --}}

                            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                    class="bi bi-printer me-2"></i>Cetak</button>
                        </div>

                    </div>

                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kamar</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Akhir</th>
                            <th scope="col">Durasi</th>
                            <th scope="col">Status Booking</th>
                            <th scope="col">Status Pembayaran</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>

                                <td>{{ $booking->member->nama_lengkap }}</td>
                                <td>{{ $booking->room->nama }}</td>
                                <td>{{ date("d F Y", strtotime($booking->start_date)) }}</td>
                                <td>{{ date("d F Y", strtotime($booking->end_date)) }}</td>
                                <td>{{ (strtotime($booking->end_date) - strtotime($booking->start_date)) / (60 * 60 * 24) . " Hari" }}
                                </td>
                                <td><span
                                        class="badge rounded-pill {{ $booking->status_pembayaran == "pending" ? "bg-warning" : "bg-success" }} text-white">{{ $booking->status_pembayaran }}</span>
                                </td>
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

                                <td>
                                    <a href="{{ url("booking-admin/$booking->id") }}" class="btn btn-warning btn-sm"><i
                                            class="bi bi-pencil-square"></i></a>

                                    <form action="{{ url("booking-admin/$booking->id") }}" method="POST" class="d-inline">
                                        @method("DELETE")
                                        @csrf
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
