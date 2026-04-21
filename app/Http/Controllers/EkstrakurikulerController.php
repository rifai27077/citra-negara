<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of extracurriculars by category.
     */
    public function getByCategory($category)
    {
        $category = strtoupper($category);
        $eskuls = Ekstrakurikuler::where('category', $category)
            ->orderBy('name')
            ->get();

        $viewName = strtolower($category) . '.ekstrakurikuler';

        if (!view()->exists($viewName)) {
            abort(404);
        }

        return view($viewName, compact('eskuls'));
    }

    /**
     * Display the specified extracurricular.
     */
    public function show($slug, $category)
    {
        $ekstrakurikuler = Ekstrakurikuler::where('category', strtoupper($category))
            ->where('slug', $slug)
            ->firstOrFail();
            
        return view('ekstrakurikuler.show', compact('ekstrakurikuler'));
    }
}
