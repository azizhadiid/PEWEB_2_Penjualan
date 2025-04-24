<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        return view('produk.index');
    }

    // function menyimpan
    function store(Request $request)
    {
        DB::table('produks')->insert([
            'nama' => $request->nama,
            'id_kategori' => $request->id_kategori,
            'qty' => $request->qty,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual
        ]);
        // Perbaiki key flash message
        Session::flash('message', 'Produk telah ditambahkan');
        return redirect()->route('produk/show.index');
    }

    public function show(Request $request)
    {
        $nama = $request->nama;
        $produks = DB::table('produks')
            ->where('nama', 'LIKE', '%' . $nama . '%')
            ->simplePaginate(10);
        return view('produk.show', ["produks" => $produks, 'nama' => $nama]);
    }

    // function menampilkan
    function detail($id)
    {
        $produk = Produk::find($id); // Menggunakan model Student untuk mencari data

        if (!$produk) {
            return redirect()->route('produk/show.index')->with('error', 'Produk tidak ditemukan');
        }

        return view('produk.detail', ['produk' => $produk]);
    }

    // Function edit
    function edit($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            abort(404);
        }

        return view('produk.edit', ['produk' => $produk]);
    }

    // function update
    function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        $produk->update([
            'nama' => $request->nama,
            'id_kategori' => $request->id_kategori,
            'qty' => $request->qty,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual
        ]);

        Session::flash('message', 'Produk telah diedit');
        return redirect()->route('produk/show.index');
    }

    // function delete
    function delete(Request $request, $id)
    {
        $produk = Produk::find($id);
        $nama = $request->nama;

        $produk->delete();

        Session::flash('message', 'Data produk telah dihapus');
        return redirect()->route('produk/show.index', ['nama' => $nama]);
    }
}
