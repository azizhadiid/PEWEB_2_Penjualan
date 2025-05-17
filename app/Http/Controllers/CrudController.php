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

    public function hapus($id)
    {
        // Cek Relasi
        $data_user = User::findOrFail($id);

        // Delete from DB
        $data_user->delete();

        return back()->with('status', 'Data Berhasil di Hapus');
    }

    public function ubah($id)
    {
        // Get Data
        $data_user = User::findOrFail($id);

        // Tampilkan
        return view('ubah', compact('data_user'));
    }

    public function proses_ubah(Request $request, $id)
    {
        // Aturan Validasi
        $rule_validasi = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => $request->filled('password') ? 'required|string|min:8' : '',
        ];

        // Pesan Validasi Kustom
        $pesan_validasi = [
            'name.required'     => 'Nama harus diisi!',
            'email.required'    => 'Email harus diisi!',
            'email.email'       => 'Format email tidak sesuai!',
            'email.unique'      => 'Email sudah terpakai!',
            'password.required' => 'Password harus diisi!',
            'password.min'      => 'Password minimal 8 karakter!',
        ];

        // Lakukan Validasi
        $request->validate($rule_validasi, $pesan_validasi);

        // Update Data User
        $data_to_save = User::findOrFail($id);
        $data_to_save->name = $request->name;
        $data_to_save->email = $request->email;

        // Cek apakah password diubah
        if ($request->filled('password')) {
            $data_to_save->password = Hash::make($request->password);
        } else {
            $data_to_save->password = $request->password_lama; // Hati-hati: pastikan ini hash juga!
        }

        $data_to_save->save();

        return back()->with('status', 'Update Data Berhasil!');
    }
}
