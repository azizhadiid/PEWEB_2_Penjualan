<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // Jika nama tabel tidak jamak (plural) dari nama model, sebutkan nama tabelnya:
    protected $table = 'produks';

    // Jika tidak menggunakan timestamps (created_at & updated_at)
    public $timestamps = false;

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama',
        'id_kategori',
        'qty',
        'harga_beli',
        'harga_jual'
    ];
}
