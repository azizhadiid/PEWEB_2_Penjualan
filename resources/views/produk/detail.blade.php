@extends('templates.mainLayoutUser')

@section('title', 'Detail Produk')

@section('konten')
{{-- Hero Section --}}
<section>
    <div class="container mt-5 mb-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4>Detail Produk</h4>
            </div>
            <div class="card-body">
                <h5 class="mb-3"><strong>Nama:</strong> {{ $produk->nama }}</h5>
                <p><strong>Category ID:</strong> {{ $produk->id_kategori }}</p>
                <p><strong>Kuatiti:</strong> {{ $produk->qty }}</p>
                <p><strong>Harga Beli:</strong> {{ $produk->harga_beli }}</p>
                <p><strong>Harga Jual:</strong> {{ $produk->harga_jual }}</p>
                <a href="{{ route('produk/show.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</section>
@endsection
