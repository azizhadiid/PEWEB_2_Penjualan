<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
Route::post('/produk', [ProductController::class, 'store']);
Route::get('/produk/show', [ProductController::class, 'show'])->name('produk/show.index');

// Route Menampilkan halaman Edit
Route::get('/produk/{id}/edit', [ProductController::class, 'edit']);

// Route Mengedit
Route::patch('/produk/{id}/update', [ProductController::class, 'update']);

// Route Detail data produk
Route::get('/produk/{id}/detail', [ProductController::class, 'detail']);

// Delete Data Produk
Route::get('/produk/{id}/delete', [ProductController::class, 'delete']);

Route::get('/halaman', function () {
    $title = 'Harry Pooter';
    $konten = 'harry potter and the deathly hallows: part 2';
    return view('konten.halaman', compact('title', 'konten'));
});

// Tambah
Route::get('/tambah', [CrudController::class, 'tambah'])->name('get.tambah');
Route::post('/tambah/proses', [CrudController::class, 'proses_tambah'])->name('post.tambah');
Route::get('/baca', [CrudController::class, 'baca'])->name('get.baca');
