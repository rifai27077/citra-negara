<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PpdbController extends Controller
{
    // Menampilkan halaman form
    public function index()
    {
        return view('ppdb');
    }

    // Menyimpan data dari form
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:100',
            'nisn' => 'required|string|max:20',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'required|string',
            'sekolah_asal' => 'required|string|max:100',
            'alamat_sekolah' => 'required|string',
            'jurusan' => 'required|string',
        ]);

        // Contoh: nanti kamu bisa simpan ke database di sini
        // Misal: Ppdb::create($request->all());

        // Setelah disimpan, arahkan ke halaman sukses
        return redirect()->route('ppdb.success')->with('success', 'Pendaftaran berhasil!');
    }

    // Halaman sukses
    public function success()
    {
        return view('ppdb-success');
    }
}
