<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function show($slug, $category)
    {
        $prestasi = \App\Models\Prestasi::where('category', strtoupper($category))
            ->where('slug', $slug)
            ->firstOrFail();
            
        return view('prestasi.show', compact('prestasi'));
    }
}
