<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::where('is_published', true)
            ->latest('published_at')
            ->paginate(9);

        return view('berita', compact('beritas'));
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('berita.template', compact('berita'));
    }
}
