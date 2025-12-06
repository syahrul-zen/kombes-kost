@extends("Admin.Layouts.main")

@section("container")
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="bg-light h-100 rounded p-4">
                <h6 class="mb-4">Edit Data Kamar Kos</h6>

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
                <form action="{{ route("room.update", $room->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT") {{-- Wajib untuk method update Laravel --}}

                    {{-- Row 1: Nama dan Tipe Kamar --}}
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="nama-kamar" class="form-label">Nama Kamar <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error("nama") is-invalid @enderror" name="nama"
                                value="{{ old("nama", $room->nama) }}" id="nama-kamar" autocomplete="off" required>
                            @error("nama")
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="tipe-kamar" class="form-label">Tipe Kamar <span class="text-danger">*</span></label>
                            <select class="form-select @error("tipe") is-invalid @enderror" name="tipe" id="tipe-kamar"
                                required>
                                <option value="" disabled>Pilih Tipe</option>
                                @foreach (["A", "B", "C"] as $tipe)
                                    {{-- Menggunakan $room->tipe untuk menentukan opsi terpilih --}}
                                    <option value="{{ $tipe }}"
                                        {{ old("tipe", $room->tipe) == $tipe ? "selected" : "" }}>
                                        {{ $tipe }}
                                    </option>
                                @endforeach
                            </select>
                            @error("tipe")
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Row 2: Harga 3 Bulan --}}
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label for="harga-3-bulan" class="form-label">Harga Sewa Per (3 Bulan) <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control @error("harga_per_3_bulan") is-invalid @enderror"
                                name="harga_per_3_bulan" value="{{ old("harga_per_3_bulan", $room->harga_per_3_bulan) }}"
                                id="harga-3-bulan" min="0" required>
                            @error("harga_per_3_bulan")
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>

                    {{-- BARIS BARU (Row 3): Input Foto Kamar --}}
                    <div class="row">

                        {{-- Kolom 1: Foto Sampul (gambar_sampul) --}}
                        <div class="col-lg-4 mb-3">
                            <label for="gambar_sampul" class="form-label">Foto 1 (Sampul)</label>
                            <input class="form-control @error("gambar_sampul") is-invalid @enderror" type="file"
                                name="gambar_sampul" id="gambar_sampul"
                                onchange="previewImage('gambar_sampul', 'preview_1')" accept="image/*">
                            @error("gambar_sampul")
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                            <div class="mt-2">
                                {{-- Preview Gambar Sampul saat ini --}}
                                @if ($room->gambar_sampul)
                                    <img id="preview_1" class="img-preview img-fluid"
                                        style="max-height: 100px; display: block;"
                                        src="{{ asset("File/" . $room->gambar_sampul) }}">
                                @else
                                    <img id="preview_1" class="img-preview img-fluid"
                                        style="max-height: 100px; display: none;">
                                @endif
                            </div>
                        </div>

                        {{-- Kolom 2: Foto 2 (gambar_2) --}}
                        <div class="col-lg-4 mb-3">
                            <label for="gambar_2" class="form-label">Foto 2</label>
                            <input class="form-control @error("gambar_2") is-invalid @enderror" type="file"
                                name="gambar_2" id="gambar_2" onchange="previewImage('gambar_2', 'preview_2')"
                                accept="image/*">
                            @error("gambar_2")
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                            <div class="mt-2">
                                {{-- Preview Gambar 2 saat ini --}}
                                <img id="preview_2" class="img-preview img-fluid" style="max-height: 100px; display: block;"
                                    src="{{ asset("File/" . $room->gambar_2) }}">
                                {{-- @if ($room->gambar_2)
                                @else
                                    <img id="preview_2" class="img-preview img-fluid"
                                        style="max-height: 100px; display: none;">
                                @endif --}}
                            </div>
                        </div>

                        {{-- Kolom 3: Foto 3 (gambar_3) --}}
                        <div class="col-lg-4 mb-3">
                            <label for="gambar_3" class="form-label">Foto 3</label>
                            <input class="form-control @error("gambar_3") is-invalid @enderror" type="file"
                                name="gambar_3" id="gambar_3" onchange="previewImage('gambar_3', 'preview_3')"
                                accept="image/*">
                            @error("gambar_3")
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                            <div class="mt-2">
                                {{-- Preview Gambar 3 saat ini --}}
                                <img id="preview_3" class="img-preview img-fluid" style="max-height: 100px; display: block;"
                                    src="{{ asset("File/" . $room->gambar_3) }}">
                            </div>
                        </div>
                    </div>
                    <hr>

                    {{-- Row 4: Deskripsi --}}
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Kamar</label>
                            {{-- Memuat data deskripsi yang sudah ada --}}
                            <textarea class="form-control @error("deskripsi") is-invalid @enderror" name="deskripsi" id="deskripsi" rows="5">{{ old("deskripsi", $room->deskripsi) }}</textarea>
                            @error("deskripsi")
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <a href="{{ url("room") }}" class="btn btn-warning me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>

                {{-- Pastikan script JS previewImage() ada di halaman ini atau file terpisah --}}
                {{-- Anda perlu menggunakan asset('storage/') untuk menampilkan gambar yang sudah ada --}}

            </div>
        </div>
    </div>

    {{-- Script untuk Preview Gambar --}}
    <script>
        function previewImage(inputId, previewId) {
            // 1. Ambil elemen input file dan elemen img preview berdasarkan ID
            const imageInput = document.getElementById(inputId);
            const imagePreview = document.getElementById(previewId);

            // 2. Pastikan ada file yang dipilih
            if (imageInput.files && imageInput.files[0]) {
                // Buat objek FileReader baru
                const oFReader = new FileReader();

                // Ketika file selesai dibaca, set src img preview
                oFReader.onload = function(oFREvent) {
                    imagePreview.style.display = 'block'; // Tampilkan elemen img
                    imagePreview.src = oFREvent.target.result;
                };

                // Baca file sebagai URL data
                oFReader.readAsDataURL(imageInput.files[0]);
            } else {
                // Jika file dihapus atau tidak ada, sembunyikan preview
                imagePreview.style.display = 'none';
                imagePreview.src = '';
            }
        }
    </script>
@endsection
