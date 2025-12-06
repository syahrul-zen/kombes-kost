@extends("Member.Layouts.main")

@section("container")
    <!-- Profile Header -->
    <section class="profile-header" style="margin-top: 76px;">
        <div class="container">
            <div class="profile-card">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center">
                        <img src="{{ asset("File/" . $member->foto) }}" alt="Profile Avatar" class="profile-avatar">
                    </div>
                    <div class="col-md-6">
                        <div class="profile-info">
                            <h3>{{ $member->nama_lengkap }}</h3>
                            <p><i class="bi bi-envelope"></i> {{ $member->email }}</p>
                            <p><i class="bi bi-telephone"></i> {{ $member->no_wa }}</p>
                            <p><i class="bi bi-geo-alt"></i>{{ $member->alamat }}</p>
                            <p><i class="bi bi-calendar"></i> Bergabung sejak {{ $member->created_at->format("F Y") }}</p>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        {{-- <button class="btn btn-pink mb-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="bi bi-pencil-square"></i> Edit Profil
                        </button> --}}
                        <br>
                        {{-- <button class="btn btn-outline-pink">
                            <i class="bi bi-key"></i> Ganti Password
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    {{-- <section class="stats-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <div class="stat-number">12</div>
                        <p>Total Booking</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <div class="stat-number">2</div>
                        <p>Booking Aktif</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div class="stat-number">8</div>
                        <p>Selesai</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="stat-number">4.8</div>
                        <p>Rating Rata-rata</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Booking History Section -->
    <section class="booking-section">
        <div class="container">
            <h2 class="section-title">Riwayat Booking</h2>

            <!-- Tabs -->
            {{-- <ul class="nav nav-tabs mb-4" id="bookingTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                        type="button">
                        Semua
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="active-tab" data-bs-toggle="tab" data-bs-target="#active" type="button">
                        Aktif
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed"
                        type="button">
                        Selesai
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled"
                        type="button">
                        Dibatalkan
                    </button>
                </li>
            </ul> --}}

            <!-- Tab Content -->
            <div class="tab-content" id="bookingTabsContent">
                <!-- All Bookings -->
                <div class="tab-pane fade show active" id="all" role="tabpanel">

                    @foreach ($member->bookings as $booking)
                        <!-- Booking Card 3 - Completed -->
                        <div class="booking-card">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="{{ asset("File/" . $booking->room->gambar_sampul) }}" alt="Booking Image "
                                        class="booking-image">
                                </div>
                                <div class="col-md-6">
                                    <div class="booking-details">
                                        <h5>{{ $booking->room->nama }}</h5>
                                        {{-- <p><i class="bi bi-geo-alt"></i> Jl. Gatot Subroto No. 456, Jakarta Timur</p> --}}
                                        <p><i class="bi bi-calendar"></i> Check-in:
                                            {{ date("d M Y", strtotime($booking->start_date)) }} | Check-out:
                                            {{ date("d M Y", strtotime($booking->end_date)) }}</p>

                                        <p><i class="bi bi-cash"></i> Total Pembayaran:
                                            Rp{{ number_format($booking->total_harga, 0, ",", ".") }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 text-end">

                                    {{-- @if ($booking->status_booking == "pending")
                                        <span
                                            class="booking-status bg-warning text-white">{{ $booking->status_booking }}</span>
                                    @else
                                        <span
                                            class="booking-status bg-success text-white">{{ $booking->status_booking }}</span>
                                    @endif --}}

                                    @if ($booking->status_booking == "pending")
                                        <span
                                            class="booking-status bg-warning text-white">{{ $booking->status_booking }}</span>
                                    @elseif($booking->status_booking == "confirmed")
                                        <span
                                            class="booking-status bg-success text-white">{{ $booking->status_booking }}</span>
                                    @elseif ($booking->status_booking == "check_in")
                                        <span
                                            class="booking-status bg-primary text-white">{{ $booking->status_booking }}</span>
                                    @else
                                        <span
                                            class="booking-status bg-secondary text-white">{{ $booking->status_booking }}</span>
                                    @endif
                                    <div class="d-flex justify-content-end mt-3 gap-2">
                                        <a href="{{ url("detail/" . $booking->id) }}"
                                            class="btn btn-pink btn-sm">Detail</a>
                                        {{-- <button class="btn btn-outline-pink btn-sm">Ulasan</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </section>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profil</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editProfileForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" value="Sarah Putri" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="sarah.putri@email.com" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" value="+62 812-3456-7890" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-select" required>
                                    <option value="perempuan" selected>Perempuan</option>
                                    <option value="laki-laki">Laki-laki</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" rows="3" required>Jakarta Selatan, Indonesia</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" value="1998-05-15">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" value="Mahasiswi">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-pink" onclick="saveProfile()">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
