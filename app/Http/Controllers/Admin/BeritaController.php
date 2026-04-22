<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of berita
     */
    public function index(Request $request): View
    {
        $query = Berita::with('author');

        // Filter by jenjang
        if ($request->filled('jenjang') && $request->jenjang !== 'semua') {
            $query->byJenjang($request->jenjang);
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'published') {
                $query->where('is_published', true);
            } elseif ($request->status === 'draft') {
                $query->where('is_published', false);
            }
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Statistics per jenjang
        $stats = [
            'semua' => Berita::count(),
            'umum' => Berita::umum()->count(),
            'smk' => Berita::smk()->count(),
            'smp' => Berita::smp()->count(),
            'sma' => Berita::sma()->count(),
        ];

        $berita = $query->latest()->paginate(15)->withQueryString();

        return view('admin.berita.index', compact('berita', 'stats'));
    }

    /**
     * Show the form for creating new berita
     */
    public function create(): View
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created berita
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'category' => 'nullable|string|max:50',
            'jenjang' => 'required|in:umum,smk,smp,sma',
            'is_published' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('berita', 'public');
        }

        // Set author
        $validated['author_id'] = Auth::id();

        // Set published_at if publishing
        if ($request->boolean('is_published')) {
            $validated['published_at'] = now();
        }

        Berita::create($validated);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Display the specified berita
     */
    public function show(Berita $beritum): View
    {
        return view('admin.berita.show', ['berita' => $beritum]);
    }

    /**
     * Show the form for editing berita
     */
    public function edit(Berita $beritum): View
    {
        return view('admin.berita.edit', ['berita' => $beritum]);
    }

    /**
     * Update the specified berita
     */
    public function update(Request $request, Berita $beritum): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'category' => 'nullable|string|max:50',
            'jenjang' => 'required|in:umum,smk,smp,sma',
            'is_published' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($beritum->image) {
                Storage::disk('public')->delete($beritum->image);
            }
            $validated['image'] = $request->file('image')->store('berita', 'public');
        }

        // Handle publish status change
        if ($request->boolean('is_published') && !$beritum->is_published) {
            $validated['published_at'] = now();
        }

        $beritum->update($validated);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Toggle publish status
     */
    public function togglePublish(Berita $beritum): RedirectResponse
    {
        $beritum->update([
            'is_published' => !$beritum->is_published,
            'published_at' => !$beritum->is_published ? now() : $beritum->published_at,
        ]);

        $status = $beritum->is_published ? 'dipublikasikan' : 'disimpan sebagai draft';

        return back()->with('success', "Berita berhasil {$status}.");
    }

    /**
     * Remove the specified berita
     */
    public function destroy(Berita $beritum): RedirectResponse
    {
        // Delete image
        if ($beritum->image) {
            Storage::disk('public')->delete($beritum->image);
        }

        $beritum->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
