<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CrudController extends Controller
{
    public function tambah()
    {
        return view('tambah');
    }

    public function proses_tambah(Request $request)
    {
        // Aturan Validasi
        $rule_validasi = [
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:5'
        ];

        // Custom Message
        $pesan_validasi = [
            'name.required'     => 'Nama Harus di Isi !',

            'email.required'    => 'e-Mail Harus di Isi !',
            'email.email'       => 'Format e-Mail Tidak Sesuai !',

            'password.required' => 'Password Harus di Isi !',
            'password.min'      => 'Password Minimal 5 Karakter !'
        ];

        // Lakukan Validasi
        $request->validate($rule_validasi, $pesan_validasi);

        // Mapping All Request
        $data_to_save = new User();
        $data_to_save->name     = $request->name;
        $data_to_save->email    = $request->email;
        $data_to_save->password = Hash::make($request->password);

        // Save to DB
        $data_to_save->save();

        // Kembali dengan Flash Session Data
        return back()->with('status', 'Data Telah Disimpan !');
    }

    public function baca()
    {
        // Get Data
        $data_users = User::all();

        // Tampilkan
        return view('baca', compact('data_users'));
    }
}
