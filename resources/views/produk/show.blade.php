@extends('templates.mainLayoutUser')

@section('title', 'CONTROL STRUKTUR PADA BLADE TEMPLATE')

@section('konten')
{{-- Hero Section --}}
<section>
    @if (count($produk) === 1)
        <p>Jumlah Produk adalah satu</p>
    @elseif (count($produk) > 1)
        <p><b>Perulangan dengan FOR</b></p>
        @for ($i = 0; $i < count($produk); $i++)
            <p>{{ 'No: ' . $i . ' Nama Produk: ' . $produk[$i] }}</p>
        @endfor
        <hr>

        <p><b>Perulangan dengan FOREACH</b></p>
        @foreach ($produk as $index => $item)
            <p>{{ 'No: ' . $index . ' Nama Produk: ' . $item }}</p>
        @endforeach
        <hr>

        <p><b>Perulangan dengan WHILE</b></p>
        @php $no = 1; @endphp
        @while ($no <= 5)
            <p>Ini adalah perulangan ke {{ $no }}</p>
            @php $no++; @endphp
        @endwhile
    @endif
</section>
@endsection
