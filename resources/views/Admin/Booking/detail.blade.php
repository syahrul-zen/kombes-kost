{{-- Status Pembayaran --}}
{{-- Status Booking --}}

@extends('Admin.Layouts.main')



@section('container')
    <style>
        /* body {
                                                                                                    background-color: #f0f2f5;
                                                                                                }
                                                                                         */
        .chat-container {
            /* max-width: 450px; */
            margin: 50px auto;
        }

        .chat-body {
            height: 500px;
            overflow-y: auto;
            background-color: #ffffff;
            padding: 20px;
        }

        /* Balon Chat */
        .msg {
            max-width: 75%;
            padding: 10px 15px;
            border-radius: 18px;
            font-size: 0.9rem;
        }

        /* KIRI: Sekarang Berwarna Biru */
        .msg-left {
            background-color: #007bff;
            color: white;
            border-bottom-left-radius: 2px;
        }

        /* KANAN: Sekarang Polos (Putih dengan Border) */
        .msg-right {
            background-color: #f8f9fa;
            color: #333;
            border: 1px solid #dee2e6;
            border-bottom-right-radius: 2px;
        }

        .avatar {
            width: 35px;
            height: 35px;
            object-fit: cover;
            border-radius: 50%;
        }

        .time-text {
            font-size: 0.65rem;
            margin-top: 4px;
            color: #adb5bd;
        }
    </style>
    <div class="col-12">
        <h4 class="mb-2"><i class="bi bi-box-arrow-up"></i> Detail Pemesanan</h4>
        {{-- Session Message --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="bg-light h-100 rounded p-4">
            <div class="d-flex gap-2">

                <a href="{{ url('booking-admin') }}" class="btn btn-info mb-3"><i
                        class="bi bi-arrow-left-circle me-2"></i>Kembali</a>

                <!-- Button trigger modal -->

                {{-- Button Status Pembayaran --}}
                <div class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-wallet-fill me-2"></i>Status Pembayaran
                </div>

                <form action="{{ url('set-status-pembayaran/' . $booking->id) }}" method="POST">
                    @csrf

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="card p-4">
                                    <h2 class="h4 mb-4">Ubah Status Pembayaran </h2>

                                    <div class="mb-3">
                                        <label class="form-label d-block">Pilih Status Pembayaran:</label>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_pembayaran"
                                                id="statusPending" value="pending" @checked($booking->status_pembayaran == 'pending') required>
                                            <label class="form-check-label" for="statusPending">
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_pembayaran"
                                                id="statusSuccess" value="success" @checked($booking->status_pembayaran == 'success') required>
                                            <label class="form-check-label" for="statusSuccess">
                                                <span class="badge bg-success">Success</span>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-end mt-3 gap-2">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-primary">Simpan Status</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <button type="button" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#updateStatusModal">
                    <i class="bi bi-journal-text"></i> Status Booking
                </button>

                <form action="{{ url('set-status-pemesanan/' . $booking->id) }}" method="POST">
                    @csrf

                    <div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="modalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Ubah Status Booking </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <label class="form-label d-block mb-3">Pilih Status Booking:</label>

                                    <div class="d-flex flex-wrap gap-3">

                                        {{-- Opsi Status (Radio Buttons) --}}

                                        {{-- 1. PENDING --}}
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_booking"
                                                id="statusPending" value="pending" @checked($booking->status_booking == 'pending') required>
                                            <label class="form-check-label" for="statusPending">
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            </label>
                                        </div>

                                        {{-- 2. CONFIRMED --}}
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_booking"
                                                id="statusConfirmed" value="confirmed" @checked($booking->status_booking == 'confirmed')
                                                required>
                                            <label class="form-check-label" for="statusConfirmed">
                                                <span class="badge bg-success">Confirmed</span>
                                            </label>
                                        </div>

                                        {{-- 3. CHECK_IN --}}
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_booking"
                                                id="statusCheckIn" value="check_in" @checked($booking->status_booking == 'check_in') required>
                                            <label class="form-check-label" for="statusCheckIn">
                                                <span class="badge bg-primary">Check In</span>
                                            </label>
                                        </div>

                                        {{-- 4. CHECK_OUT --}}
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_booking"
                                                id="statusCheckOut" value="check_out" @checked($booking->status_booking == 'check_out')
                                                required>
                                            <label class="form-check-label" for="statusCheckOut">
                                                <span class="badge bg-secondary">Check Out</span>
                                            </label>
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan Status</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

            <table class="table-striped table-hover table">

                <tbody>
                    <tr>
                        <th scope="row" style="width: 30%">Id Booking</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ $booking->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Nama Member</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ $booking->member->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Nama Ruangan</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ $booking->room->nama }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Tipe</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ $booking->room->tipe }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Tanggal Mulai</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ date('d F Y', strtotime($booking->start_date)) }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Tanggal Selesai</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ date('d F Y', strtotime($booking->end_date)) }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Durasi Sewa</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">
                            {{ (strtotime($booking->end_date) - strtotime($booking->start_date)) / (60 * 60 * 24) . ' Hari' }}
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Total Harga</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">
                            {{ 'Rp.     ' . number_format($booking->total_harga, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Status Pembayaran</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">
                            <span
                                class="badge rounded-pill {{ $booking->status_pembayaran == 'pending' ? 'bg-warning' : 'bg-success' }} text-white">{{ $booking->status_pembayaran }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Status Booking</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">

                            {{-- <span
                                class="badge rounded-pill {{ $booking->status_booking == "pending" ? "bg-warning" : "bg-success" }} text-dark">{{ $booking->status_booking }}</span> --}}

                            <span
                                class="badge rounded-pill {{ $booking->status_booking == 'pending'
                                    ? 'bg-warning text-dark'
                                    : ($booking->status_booking == 'confirmed'
                                        ? 'bg-success'
                                        : ($booking->status_booking == 'check_in'
                                            ? 'bg-primary'
                                            : ($booking->status_booking == 'check_out'
                                                ? 'bg-secondary'
                                                : 'bg-info'))) }}">
                                {{ $booking->status_booking }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Resi Pembayaran</th>
                        <td style="width: 5%">:</td>

                        @if ($booking->bukti_pembayaran)
                            <td style="width: 65%"><a href="{{ asset('File/' . $booking->bukti_pembayaran) }}"
                                    class="btn btn-info btn-sm"><i class="bi bi-cash"></i></a></td>
                        @else
                            <td style="width: 65%"><span
                                    class="badge rounded-pill bg-danger text-white">{{ 'Belum melakukan pembayaran' }}</span>
                            </td>
                        @endif

                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="chat-container">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('File/' . $booking->member->foto) }}" class="avatar me-2">
                    <h6 class="mb-0">{{ $booking->member->nama_lengkap }}</h6>
                </div>
            </div>

            <div class="card-body chat-body">

                @foreach ($booking->complains as $complain)
                    @if ($complain->is_admin)
                        <div class="d-flex flex-column align-items-start mb-4">
                            <div class="d-flex align-items-end">
                                <img src="{{ asset('FE/img/admin.png') }}" class="avatar me-2" alt="Admin">
                                <div class="msg msg-left shadow-sm">
                                    {{ $complain->chat }}
                                </div>
                            </div>
                            <small class="time-text ms-5">{{ $complain->created_at->diffForHumans() }}</small>
                        </div>
                    @else
                        <div class="d-flex flex-column align-items-end mb-4">
                            <div class="d-flex align-items-end">
                                <div class="msg msg-right shadow-sm">
                                    {{ $complain->chat }}
                                </div>
                                <img src="{{ asset('File/' . $booking->member->foto) }}" class="avatar ms-2"
                                    alt="User">
                            </div>
                            <small class="time-text ms-5">{{ $complain->created_at->diffForHumans() }}</small>
                        </div>
                    @endif
                @endforeach

            </div>

            <div class="card-footer bg-white p-3">

                <form action="{{ url('/complain') }}" method="post">
                    @csrf
                    <input type="hidden" name="is_admin" value="1">
                    <input type="hidden" name="is_read" value="0">
                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">


                    <div class="input-group">
                        <input type="text" class="form-control border-light bg-light" name="chat"
                            placeholder="Tulis pesan..." maxlength="240">
                        <button class="btn btn-primary" type="submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
