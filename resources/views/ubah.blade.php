@extends('templates.mainLayoutUser')

@section('title', 'Ubah Data')

@section('konten')
<div class="container mt-4">
    <h3>Ubah Data Pengguna</h3>

    @if (session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Status:</strong> {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <form action="{{ route('patch.ubah', ['id' => $data_user->id]) }}" method="post">
        @csrf
        @method('PATCH')

        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ $data_user->name ?? old('name') }}" autocomplete="name" placeholder="name">
                @error('name')
                <span class="error invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">e-Mail</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ $data_user->email ?? old('email') }}" autocomplete="email" placeholder="e-Mail">
                @error('email')
                <span class="error invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <input type="hidden" name="password_lama" value="{{ $data_user->password }}">

        <div class="row mb-3">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    value="{{ old('password') }}" autocomplete="password" placeholder="Password">
                <label class="col-form-label text-md-right">Jika Tidak Ingin Ubah, Kosongkan Saja</label>
                @error('password')
                <span class="error invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>
@endsection
