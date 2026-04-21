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
            'jurusan' => 'nullable|string',
            'jurusan_smk' => 'nullable|string',
            'unit_pendidikan' => 'nullable|string',
        ]);

        $jenjang = "smk";
        if ($request->has('unit_pendidikan')) {
            $jenjang = strtolower($request->unit_pendidikan);
        }

        // if form used 'jurusan' (from smk/sma/smp spmb) it will use it.
        // if form used 'jurusan_smk' (from main ppdb form) it will use it.
        $jurusan = $request->jurusan ?? $request->jurusan_smk ?? null;

        \App\Models\PpdbRegistration::create([
            'nama_lengkap' => $request->nama,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => ($request->jenis_kelamin == 'Laki-laki' || $request->jenis_kelamin == 'L') ? 'L' : 'P',
            'alamat' => $request->alamat,
            'sekolah_asal' => $request->sekolah_asal,
            'alamat_sekolah' => $request->alamat_sekolah,
            'jenjang' => $jenjang,
            'jurusan' => $jurusan,
            'status' => 'pending',
            'catatan' => null
        ]);

        return back()->with('success', 'Pendaftaran berhasil!');
    }

    // Halaman sukses
    public function success()
    {
        return view('ppdb-success');
    }
}
