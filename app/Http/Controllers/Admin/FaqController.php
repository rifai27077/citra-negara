<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FaqController extends Controller
{
    /**
     * Display a listing of FAQs
     */
    public function index(Request $request): View
    {
        $query = Faq::query();

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by domain
        if ($request->filled('domain')) {
            $query->where('domain', $request->domain);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('question', 'like', "%{$search}%")
                  ->orWhere('answer', 'like', "%{$search}%");
            });
        }

        // Get unique categories for filter
        $categories = Faq::distinct()->pluck('category')->filter();
        $domains = Faq::distinct()->pluck('domain')->filter();

        $faqs = $query->latest()->paginate(15)->withQueryString();

        return view('admin.faq.index', compact('faqs', 'categories', 'domains'));
    }

    /**
     * Show the form for creating new FAQ
     */
    public function create(): View
    {
        $categories = Faq::distinct()->pluck('category')->filter();
        $domains = Faq::distinct()->pluck('domain')->filter();
        
        return view('admin.faq.create', compact('categories', 'domains'));
    }

    /**
     * Store a newly created FAQ
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'category' => 'nullable|string|max:100',
            'domain' => 'nullable|string|max:100',
        ]);

        Faq::create($validated);

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'FAQ berhasil ditambahkan.');
    }

    /**
     * Show the form for editing FAQ
     */
    public function edit(Faq $faq): View
    {
        $categories = Faq::distinct()->pluck('category')->filter();
        $domains = Faq::distinct()->pluck('domain')->filter();
        
        return view('admin.faq.edit', compact('faq', 'categories', 'domains'));
    }

    /**
     * Update the specified FAQ
     */
    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'category' => 'nullable|string|max:100',
            'domain' => 'nullable|string|max:100',
        ]);

        $faq->update($validated);

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'FAQ berhasil diperbarui.');
    }

    /**
     * Remove the specified FAQ
     */
    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'FAQ berhasil dihapus.');
    }
}
