<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class produkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produks')->insert(array(['nama' => 'Meja', 'id_kategori' => '1', 'qty' =>
        '12', 'harga_beli' => '50000', 'harga_jual' => '540000',], ['nama' => 'Kursi', 'id_kategori'
        => '1', 'qty' => '12', 'harga_beli' => '40000', 'harga_jual' => '450000',]));
    }
}
