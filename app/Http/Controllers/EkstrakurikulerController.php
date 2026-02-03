<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    public function show($slug, $category)
    {
        $ekstrakurikuler = \App\Models\Ekstrakurikuler::where('category', strtoupper($category))
            ->where('slug', $slug)
            ->firstOrFail();
            
        return view('ekstrakurikuler.show', compact('ekstrakurikuler'));
    }
}
