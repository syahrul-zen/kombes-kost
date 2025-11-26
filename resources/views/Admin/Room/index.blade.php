@extends('Admin.Layouts.main')

@section('container')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cetak Surat Masuk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('dashboard/suratmasuks/cetak') }}" method="POST">
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
        <h4 class="mb-2"><i class="bi bi-envelope"></i> Daftar Kamar</h4>

        {{-- Session Message --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="bg-light h-100 rounded p-4">
            <div class="table-responsive">
                {{-- <table class="table table-hover" style="color:black" id="surat_masuk"> --}}
                <table class="table-hover table" id="surat_masuk" style="color:black">

                    <div class="d-flex justify-content-between">
                        <div class="d-flex gap-3">
                            <a href="{{ url('room/create') }} " class="btn btn-primary mb-3"><i
                                    class="bi bi-plus-circle me-2"></i></i>Tambah</a>

                            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                    class="bi bi-printer me-2"></i>Cetak</button>
                        </div>

                    </div>

                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($rooms as $room)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $room->nama }}</td>
                                <td>
                                    <a href="{{ url("room/$room->id/edit") }}" class="btn btn-warning"><i
                                            class="bi bi-pencil-square"></i></a>

                                    <form action="{{ url("room/$room->id") }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i
                                                class="bi bi-trash3"></i></button>
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
