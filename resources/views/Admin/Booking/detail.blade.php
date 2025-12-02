@extends('Admin.Layouts.main')

@section('container')
    <div class="col-12">
        <h4 class="mb-2"><i class="bi bi-box-arrow-up"></i> Detail Pemesanan</h4>
        {{-- Session Message --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="bg-light rounded h-100 p-4">
            <div class="d-flex gap-2">

                <a href="{{ url('dashboard/suratmasuk') }}" class="btn btn-info  mb-3"><i
                        class="bi bi-arrow-left-circle me-2"></i>Kembali</a>

                <a href="{{ url('dashboard/disposisis1/create/' . $booking->id) }} " class="btn btn-primary mb-3"><i
                        class="bi bi-plus-circle me-2"></i>Buat</a>

                <a href="{{ url('dashboard/disposisi1_diteruskan/create_diteruskan/' . $booking->id) }} "
                    class="btn btn-success mb-3"><i class="fas fa-paper-plane me-2"></i>Teruskan</a>
                <a href="{{ url('dashboard/disposisi1/' . $booking->id . '/cetak') }} " class="btn btn-success mb-3"><i
                        class="bi bi-printer me-2"></i>Cetak</a>


                <form action="{{ url('dashboard/disposisi1/' . $booking->id . '/verifikasi') }}" method="POST">
                    @csrf
                    <div class="btn btn btn-success mb-3 " id="btn-verifikasi">
                        <i class="fas fa-key me-2"></i>Verifikasi
                    </div>
                </form>

                <!-- Button trigger modal -->

                <div class="btn btn-info mb-3 " data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-archive me-2"></i>Arsipkan
                </div>

                <form action="{{ url('dashboard/disposisi1/' . $booking->id . '/arsipkan') }}" method="POST">
                    @csrf

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan Arsipkan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="form-control" name="pesan_arsipkan"
                                        placeholder="pesan arsipkan" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form action="{{ url('dashboard/disposisi1/' . $booking->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="btn btn btn-danger mb-3 " id="btn-delete-disposisi">
                        <i class="bi bi-trash me-2"></i>Hapus
                    </div>
                </form>
            </div>

            <table class="table table-striped table-hover">

                <tbody>
                    <tr>
                        <th scope="row" style="width: 30%">Nomor Surat</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ 'Testing' }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Asal Surat</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ 'Testing' }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Tanggal Surat</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ 'Testing' }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Indek</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ 'Testing' }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Kode Klasifikasi</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ 'Testing' }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%">Tanggal Penyelesaian</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ 'Testing' }}</td>

                    </tr>


                </tbody>
            </table>
        </div>
    </div>
@endsection
