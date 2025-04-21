<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', [ProductController::class, 'index']);
Route::get('/produk/show', [ProductController::class, 'show']);

Route::get('/halaman', function () {
    $title = 'Harry Pooter';
    $konten = 'harry potter and the deathly hallows: part 2';
    return view('konten.halaman', compact('title', 'konten'));
});
