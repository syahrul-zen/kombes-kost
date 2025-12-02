@extends("Admin.Layouts.main")

@section("container")
    <!-- Modal -->
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
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No WA</th>
                            <th scope="col">Status</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $member->nama_lengkap }}</td>
                                <td>{{ $member->alamat }}</td>
                                <td>{{ $member->no_wa }}</td>
                                <td>{{ $member->status }}</td>
                                <td>{{ $member->email }}</td>
                                <td>
                                    {{-- Tambahkan data-bs-toggle dan onclick untuk memicu modal --}}
                                    <img src="{{ asset("File/" . $member->foto) }}" alt="Foto Kamar"
                                        style="max-height: 50px; max-width: 50px; object-fit: cover; cursor: pointer;"
                                        data-bs-toggle="modal" data-bs-target="#imageModal"
                                        onclick="showImage('{{ asset("File/" . $member->foto) }}')">
                                </td>
                                <td>
                                    <a href="{{ url("member/$member->id/edit") }}" class="btn btn-warning btn-sm"><i
                                            class="bi bi-pencil-square"></i></a>

                                    <form action="{{ url("room/$member->id") }}" method="POST" class="d-inline">
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
