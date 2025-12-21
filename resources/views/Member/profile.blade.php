@extends('Member.Layouts.main')

@section('container')
    <!-- Profile Header -->
    <section class="profile-header" style="margin-top: 76px;">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">

                    <ul>

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif

            @session('success')
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endsession


            <div class="profile-card">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center">
                        <img src="{{ asset('File/' . $member->foto) }}" alt="Profile Avatar" class="profile-avatar">
                    </div>
                    <div class="col-md-6">
                        <div class="profile-info">
                            <h3>{{ $member->nama_lengkap }}</h3>
                            <p><i class="bi bi-envelope"></i> {{ $member->email }}</p>
                            <p><i class="bi bi-telephone"></i> {{ $member->no_wa }}</p>
                            <p><i class="bi bi-geo-alt"></i>{{ $member->alamat }}</p>
                            <p><i class="bi bi-calendar"></i> Bergabung sejak {{ $member->created_at->format('F Y') }}</p>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <button class="btn btn-pink mb-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="bi bi-pencil-square"></i> Edit Profil
                        </button>
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
                                    <img src="{{ asset('File/' . $booking->room->gambar_sampul) }}" alt="Booking Image "
                                        class="booking-image">
                                </div>
                                <div class="col-md-6">
                                    <div class="booking-details">
                                        <h5>{{ $booking->room->nama }}</h5>
                                        {{-- <p><i class="bi bi-geo-alt"></i> Jl. Gatot Subroto No. 456, Jakarta Timur</p> --}}
                                        <p><i class="bi bi-calendar"></i> Check-in:
                                            {{ date('d M Y', strtotime($booking->start_date)) }} | Check-out:
                                            {{ date('d M Y', strtotime($booking->end_date)) }}</p>

                                        <p><i class="bi bi-cash"></i> Total Pembayaran:
                                            Rp{{ number_format($booking->total_harga, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 text-end">

                                    {{-- @if ($booking->status_booking == 'pending')
                                        <span
                                            class="booking-status bg-warning text-white">{{ $booking->status_booking }}</span>
                                    @else
                                        <span
                                            class="booking-status bg-success text-white">{{ $booking->status_booking }}</span>
                                    @endif --}}

                                    @if ($booking->status_booking == 'pending')
                                        <span
                                            class="booking-status bg-warning text-white">{{ $booking->status_booking }}</span>
                                    @elseif($booking->status_booking == 'confirmed')
                                        <span
                                            class="booking-status bg-success text-white">{{ $booking->status_booking }}</span>
                                    @elseif ($booking->status_booking == 'check_in')
                                        <span
                                            class="booking-status bg-primary text-white">{{ $booking->status_booking }}</span>
                                    @else
                                        <span
                                            class="booking-status bg-secondary text-white">{{ $booking->status_booking }}</span>
                                    @endif
                                    <div class="d-flex justify-content-end mt-3 gap-2">
                                        <a href="{{ url('detail/' . $booking->id) }}"
                                            class="btn btn-pink btn-sm">Detail</a>

                                        @if ($booking->status_pembayaran === 'success')
                                            <a href="{{ url('complain/' . $booking->id) }}"
                                                class="btn btn-pink btn-sm">Komplain</a>
                                        @endif

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
            <form id="editProfileForm" action="{{ url('edit-profile-member/' . $member->id) }}" method="POST"
                enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Profil</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control"
                                    value="{{ old('nama_lengkap', $member->nama_lengkap) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $member->email) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="tel" name="no_wa" class="form-control"
                                    value="{{ old('no_wa', $member->no_wa) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status Member <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="status" required>
                                    <option value="" selected disabled>Pilih Status Member</option>
                                    <option value="pelajar(siswa)" @selected(old('status', $member->status) === 'pelajar(siswa)')>Pelajar (Siswa)</option>
                                    <option value="mahasiswa" @selected(old('status', $member->status) === 'mahasiswa')>Mahasiswa</option>
                                    <option value="bekerja" @selected(old('status', $member->status) === 'bekerja')>Bekerja</option>
                                    <option value="dll" @selected(old('status', $member->status) === 'dll')>Dll</option>
                                </select>
                                <div class="invalid-feedback">Silakan pilih status member</div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" name="password" class="form-control"
                                    placeholder="Kosongkan jika tidak ingin mengubah">
                                <small class="text-muted">Min. 8 karakter (biarkan kosong jika tidak diganti)</small>
                            </div>

                            {{-- <div class="col-md-6 mb-3">
                                <label class="form-label">Foto Profil</label>
                                <input type="file" name="foto" class="form-control" accept="image/*">
                                @if ($member->foto)
                                    <div class="mt-2">
                                        <small class="text-muted d-block mb-1">Foto saat ini:</small>
                                        <img src="{{ asset('File/' . $member->foto) }}" alt="Foto Member"
                                            class="img-thumbnail" style="height: 50px;">
                                    </div>
                                @endif
                            </div> --}}

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Foto Profil</label>
                                <input type="file" name="foto" id="inputFoto" class="form-control"
                                    accept="image/*">

                                @if ($member->foto)
                                    <div class="mt-2">
                                        <small class="text-muted d-block mb-1">Preview Foto:</small>
                                        <img id="previewFoto" src="{{ asset('File/' . $member->foto) }}" alt="Preview"
                                            class="img-thumbnail" style="height: 100px; width: 100px; object-fit: cover;">
                                    </div>
                                @endif

                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $member->alamat) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-pink">Simpan Perubahan</button>
                    </div>
            </form>
        </div>
    </div>
    </div>

    <script>
        document.getElementById('inputFoto').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // Mengganti src image preview dengan file yang baru dipilih
                document.getElementById('previewFoto').src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
