<?php

namespace App\Http\Controllers;

use App\Models\DaftarHarga;
use Illuminate\Http\Request;

class DaftarHargaController extends Controller
{
    public function index()
    {
        // Fetch all prices sorted by category and title
        $daftarHargas = DaftarHarga::orderBy('category')
            ->orderBy('title')
            ->get()
            ->groupBy('category');

        return view('daftar-harga-all', compact('daftarHargas'));
    }

    public function showCategory(Request $request)
    {
        // Get category from route defaults or request
        $category = $request->route()->defaults['category'] ?? 'smk';
        $categoryName = strtoupper($category);
        $prices = DaftarHarga::where('category', $categoryName)
            ->orderBy('title')
            ->get();

        $viewName = strtolower($category) . '.daftar-harga';
        
        return view($viewName, compact('prices', 'categoryName'));
    }
}
