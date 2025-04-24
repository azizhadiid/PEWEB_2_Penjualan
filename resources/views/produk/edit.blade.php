@extends('templates.mainLayoutUser')

@section('title', 'Detail Produk')

@section('konten')
{{-- Hero Section --}}
<section>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Produk</h2>
        @if ($errors->any())
        <div class="alert alert-danger col-md-6">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{url('/produk/'.$produk->id.'/update')}}" method="POST" class="mb-4">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{$produk->nama}}">
            </div>
            <div class="mb-3">
                <label for="id_kategori" class="form-label">Category ID</label>
                <input type="number" class="form-control" id="id_kategori" name="id_kategori" value="{{$produk->id_kategori}}">
            </div>
            <div class="mb-3">
                <label for="qty" class="form-label">Kuantiti</label>
                <input type="numbers" class="form-control" id="qty" name="qty" value="{{$produk->qty}}">
            </div>
            <div class="mb-3">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="{{$produk->harga_beli}}">
            </div>
            <div class="mb-3">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="{{$produk->harga_jual}}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{url('produk/show.index')}}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</section>
@endsection
