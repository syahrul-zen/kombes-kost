@extends("Admin.Layouts.main")

@section("container")
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="bg-light h-100 rounded p-4">
                <h6 class="mb-4">Edit Member</h6>

                @if ($errors->any())
                    <div class="alert alert-danger">

                        <ul>

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>
                @endif

                {{-- PENTING: Tambahkan enctype="multipart/form-data" untuk upload file --}}
                <form action="{{ url("member/" . $member->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="row">
                        {{-- Kiri: Data Dasar & Kontak --}}
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error("nama_lengkap") is-invalid @enderror"
                                    id="nama_lengkap" name="nama_lengkap"
                                    value="{{ old("nama_lengkap", $member->nama_lengkap) }}" required>
                                @error("nama_lengkap")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control @error("alamat") is-invalid @enderror" id="alamat" name="alamat" rows="3"
                                    required>{{ old("alamat", $member->alamat) }}</textarea>
                                @error("alamat")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="no_wa" class="form-label">Nomor WhatsApp</label>
                                <input type="text" class="form-control @error("no_wa") is-invalid @enderror"
                                    id="no_wa" name="no_wa" value="{{ old("no_wa", $member->no_wa) }}" required>
                                @error("no_wa")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status Anggota</label>
                                <select class="form-select @error("status") is-invalid @enderror" id="status"
                                    name="status" required>

                                    <option value="pelajar(siswa)" @checked(old("status", $member->status) == "pelajar(siswa)")>Pelejar (Siswa)</option>
                                    <option value="mahasiswa" @checked(old("status", $member->status) == "mahasiswa")>Mahasiswa</option>
                                    <option value="beker" @checked(old("status", $member->status) == "bekerja")>Bekerja</option>
                                    <option value="beker" @checked(old("status", $member->status) == "dll")>Dll</option>
                                </select>
                                @error("status")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        {{-- Kanan: Akun & Foto --}}
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error("email") is-invalid @enderror"
                                    id="email" name="email" value="{{ old("email", $member->email) }}" required>
                                @error("email")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control @error("password") is-invalid @enderror"
                                    id="password" name="password" placeholder="Kosongkan jika tidak ingin diubah">
                                <small class="form-text text-muted">Isi hanya jika Anda ingin mengganti password.</small>
                                @error("password")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="gambar_sampul" class="form-label">Foto Kamar (Maks. 2MB)</label>
                                <input class="form-control @error("foto") is-invalid @enderror" type="file"
                                    name="foto" id="gambar_sampul" onchange="previewImage()" accept="image/*">
                                @error("foto")
                                    <div class="invalid-feedback text-red">{{ $message }}</div>
                                @enderror

                                {{-- Image Preview Area --}}
                                <div class="mt-2">
                                    <img class="img-preview img-fluid" style="max-height: 200px;"
                                        src="{{ asset("File/" . $member->foto) }}  ">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <a href="{{ url("member") }}" class="btn btn-warning me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Edit data member</button>

                </form>
            </div>
        </div>
    </div>

    {{-- Script untuk Preview Gambar --}}
    <script>
        function previewImage() {
            const image = document.querySelector('#gambar_sampul');
            const imgPreview = document.querySelector('.img-preview');

            // Tampilkan elemen preview
            imgPreview.style.display = 'block';

            // Dapatkan file yang diinput
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            // Set sumber gambar setelah file selesai dibaca
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
