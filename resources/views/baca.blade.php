@extends('templates.mainLayoutUser')

@section('title', 'Baca')

@section('konten')
<div class="container mt-4">
    <h3>Daftar Pengguna</h3>

    {{-- Alert Status --}}
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th> {{-- Kolom baru --}}
            </tr>
        </thead>
        <tbody>
            @foreach($data_users as $index => $user)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('get.ubah', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('delete.hapus', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
