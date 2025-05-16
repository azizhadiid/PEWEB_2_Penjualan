@extends('templates.mainLayoutUser')

@section('title', 'Baca')

@section('konten')
<div class="container mt-4">
    <h3>Daftar Pengguna</h3>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_users as $index => $user)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
