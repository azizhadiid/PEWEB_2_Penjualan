@extends('templates.mainLayoutUser')

@section('title', 'Laravel Saya')

@section('konten')
    {{-- Hero Section --}}
    <section>
        <h1>Produk : {{ $produk }}</h1> 
    </section>
@endsection