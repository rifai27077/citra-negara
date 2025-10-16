<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkademikController extends Controller
{
    public function index()
    {
        // Kalau static langsung return view
        return view('akademik');

        // Kalau nanti mau dynamic (data dari database), bisa kirim data ke view:
        // $prestasi = Prestasi::latest()->take(3)->get();
        // return view('akademik', compact('prestasi'));
    }
}
