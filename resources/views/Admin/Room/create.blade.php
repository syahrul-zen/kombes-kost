@extends('Admin.Layouts.main')

@section('container')
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="bg-light h-100 rounded p-4">
                <h6 class="mb-4">Tambah Data Kamar Kos</h6>



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
                <form action="{{ url('room') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Row 1: Nama dan Tipe Kamar --}}
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="nama-kamar" class="form-label">Nama Kamar <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                value="{{ old('nama') }}" id="nama-kamar" autocomplete="off" required>
                            @error('nama')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="tipe-kamar" class="form-label">Tipe Kamar <span class="text-danger">*</span></label>
                            <select class="form-select @error('tipe') is-invalid @enderror" name="tipe" id="tipe-kamar"
                                required>
                                <option value="" selected disabled>Pilih Tipe</option>
                                @foreach (['A', 'B', 'C'] as $tipe)
                                    <option value="{{ $tipe }}" {{ old('tipe') == $tipe ? 'selected' : '' }}>
                                        {{ $tipe }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tipe')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Row 2: Harga 3 Bulan  --}}
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="harga-3-bulan" class="form-label">Harga Sewa Per (3 Bulan) <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('harga_per_3_bulan') is-invalid @enderror"
                                name="harga_per_3_bulan" value="{{ old('harga_per_3_bulan') }}" id="harga-3-bulan"
                                min="0" required>
                            @error('harga_per_3_bulan')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="gambar_sampul" class="form-label">Foto Kamar (Maks. 2MB)</label>
                            <input class="form-control @error('gambar_sampul') is-invalid @enderror" type="file"
                                name="gambar_sampul" id="gambar_sampul" onchange="previewImage()">
                            @error('gambar_sampul')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror

                            {{-- Image Preview Area --}}
                            <div class="mt-2">
                                <img class="img-preview img-fluid" style="max-height: 200px; display: none;">
                            </div>
                        </div>
                    </div>

                    {{-- Row 3: Foto dan Deskripsi --}}
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Kamar</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="5">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <a href="{{ url('dashboard/kamar') }}" class="btn btn-warning me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Data Kamar</button>
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
