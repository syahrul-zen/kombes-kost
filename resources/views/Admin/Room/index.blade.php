@extends("Admin.Layouts.main")

@section("container")
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cetak Surat Masuk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url("dashboard/suratmasuks/cetak") }}" method="POST">
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

    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Tampilan Penuh Foto Kamar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    {{-- Gambar ini akan diperbarui oleh JavaScript --}}
                    <img id="fullImageDisplay" src="" class="img-fluid" alt="Foto Kamar Penuh">
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <h4 class="mb-2"><i class="bi bi-house-door"></i> Daftar Kamar</h4>

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
                            <a href="{{ url("room/create") }} " class="btn btn-primary mb-3"><i
                                    class="bi bi-plus-circle me-2"></i>Tambah Kamar</a>

                            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                    class="bi bi-printer me-2"></i>Cetak</button>
                        </div>

                    </div>

                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tipe</th>
                            <th scope="col">Harga/3 Bulan</th>
                            <th scope="col">Gambar Sampul</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $room->nama }}</td>
                                <td>{{ $room->tipe }}</td>
                                <td>Rp {{ number_format($room->harga_per_3_bulan, 0, ",", ".") }}</td>
                                <td>
                                    @if ($room->gambar_sampul)
                                        {{-- Tambahkan data-bs-toggle dan onclick untuk memicu modal --}}
                                        <img src="{{ asset("File/" . $room->gambar_sampul) }}" alt="Foto Kamar"
                                            style="max-height: 50px; max-width: 50px; object-fit: cover; cursor: pointer;"
                                            data-bs-toggle="modal" data-bs-target="#imageModal"
                                            onclick="showImage('{{ asset("File/" . $room->gambar_sampul) }}')">
                                    @else
                                        Tidak Ada Foto
                                    @endif
                                </td>
                                <td>
                                    <p
                                        style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        {{ Str::limit(strip_tags(nl2br($room->deskripsi)), 50) }}
                                    </p>
                                </td>
                                <td>
                                    <a href="{{ url("room/$room->id/edit") }}" class="btn btn-warning btn-sm"><i
                                            class="bi bi-pencil-square"></i></a>

                                    <form action="{{ url("room/$room->id") }}" method="POST" class="d-inline">
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

{{-- **Tambahkan kode Modal ini di bagian akhir file Blade Anda** --}}
{{-- @include("Admin.Components.image_modal") --}}

{{-- Script untuk mengatur tampilan gambar pada modal --}}

<script>
    /**
     * Fungsi untuk mengatur URL gambar pada modal dan menampilkannya.
     * @param {string} imageUrl - URL lengkap dari gambar sampul.
     */
    function showImage(imageUrl) {
        document.getElementById('fullImageDisplay').src = imageUrl;
    }
</script>
