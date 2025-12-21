{{-- Status Pembayaran --}}
{{-- Status Booking --}}

@extends('Admin.Layouts.main')



@section('container')
    <style>
        */ .chat-container {
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

        @session('success')
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endsession

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
                        <input type="hidden" name="is_read" value="1">
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
    </div>
@endsection
