<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $produk = 'Aqua 400ML';
        return view('produk.index', ['produk' => $produk]);
    }

    public function show()
    {
        $produk = ['Aqua 115 ML', 'Minuman Bersoda', 'Buku Sejarah', 'Mouse', 'CPU'];
        return view('produk.show', ['produk' => $produk]);
    }
}
