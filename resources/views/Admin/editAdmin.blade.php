@extends('Admin.Layouts.main')

@section('container')
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="bg-light h-100 rounded p-4">
                <h6 class="mb-4">Edit Admin</h6>

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
                <form action="{{ url('update-admin/' . $admin->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Row 1: Nama dan Tipe Kamar --}}
                    <div class="row">
                        <div class="col-lg-8 mb-3">

                            <label for="nama-kamar" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name', $admin->name) }}" id="nama-kamar" autocomplete="off" required>
                            @error('name')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-8 mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email', $admin->email) }}" id="email" autocomplete="off" required>
                        @error('email')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-8 mb-3">
                        <label for="no_wa" class="form-label">No WA <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control @error('no_wa') is-invalid @enderror" name="no_wa"
                            value="{{ old('no_wa', $admin->no_wa) }}" id="no_wa" autocomplete="off" required>
                        @error('no_wa')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-8 mb-3">

                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password"
                            id="password" placeholder="Kosongkan jika tidak ingin merubah" autocomplete="off">
                        @error('email')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <a href="{{ url('member') }}" class="btn btn-warning me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Edit Admin</button>
            </div>
        </div>
    </div>
@endsection
