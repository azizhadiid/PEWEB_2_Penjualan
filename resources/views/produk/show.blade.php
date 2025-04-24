@extends('templates.mainLayoutUser')

@section('title', 'CONTROL STRUKTUR PADA BLADE TEMPLATE')

@section('konten')
{{-- Hero Section --}}
<section>
    <div class="container mt-4 mb-5">
        <h2 class="text-center mb-4">Daftar Produk</h2>
        @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }} <strong>{{ $nama }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        {{-- Form Pencarian --}}
        <form action="" method="GET" class="mb-4 d-flex justify-content-end">
            <input class="form-control w-25 me-2" type="search" placeholder="Cari produk..." name="nama"
                value="{{ request('nama') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </form>

        {{-- Alert jika tidak ada data --}}
        @if ($produks->isEmpty())
        <div class="alert alert-warning text-center">
            Tidak ada produk yang ditemukan. dengan nama <strong>{{$nama}}</strong>
        </div>
        @endif
        <div class="row g-4 justify-content-center mt-5">
            @foreach ($produks as $product)
            <div class="col-md-4 col-lg-3">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h6 class="text-primary fw-bold">#{{ $product->id }}</h6> {{-- Nomor Urut --}}
                        <h5 class="card-title">{{ $product->nama }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Category ID: {{ $product->id_kategori }}</h6>
                        <p class="card-text"><strong>Stok:</strong> {{ $product->qty }}</p>
                        <p class="card-text"><strong>Harga Jual:</strong>
                            Rp{{ number_format($product->harga_jual, 0, ',', '.') }}</p>
                        <p class="card-text"><strong>Harga Beli:</strong>
                            Rp{{ number_format($product->harga_beli, 0, ',', '.') }}</p>
                        <a href="{{url('produk/'.$product->id.'/detail')}}"
                            class="btn btn-outline-success btn-sm mx-1">Detail</a>
                        <a href="{{url('produk/'.$product->id.'/edit')}}"
                            class="btn btn-outline-primary btn-sm mx-1">Edit</a>
                        <a href="{{url('produk/'.$product->id.'/delete')}}"
                            class="btn btn-outline-danger btn-sm mx-1">Hapus</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const deleteButtons = document.querySelectorAll(".btn-outline-danger");

            deleteButtons.forEach(button => {
                button.addEventListener("click", function (event) {
                    event.preventDefault(); // Mencegah navigasi langsung

                    const deleteUrl = this.getAttribute("href");

                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        text: "Data produk akan dihapus secara permanen!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, hapus!",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href =
                                deleteUrl; // Redirect ke URL hapus jika dikonfirmasi
                        }
                    });
                });
            });
        });

    </script>
</section>
@endsection
