<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PpdbRegistration;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PpdbController extends Controller
{
    /**
     * Display a listing of PPDB registrations
     */
    public function index(Request $request): View
    {
        $query = PpdbRegistration::query();

        // Filter by jenjang
        if ($request->filled('jenjang') && $request->jenjang !== 'semua') {
            $query->byJenjang($request->jenjang);
        }

        // Filter by status
        if ($request->filled('status') && $request->status !== 'semua') {
            $query->byStatus($request->status);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nisn', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('sekolah_asal', 'like', "%{$search}%");
            });
        }

        // Statistics per jenjang
        $stats = [
            'semua' => PpdbRegistration::count(),
            'smk' => PpdbRegistration::smk()->count(),
            'smp' => PpdbRegistration::smp()->count(),
            'sma' => PpdbRegistration::sma()->count(),
        ];

        $registrations = $query->latest()->paginate(15)->withQueryString();

        return view('admin.ppdb.index', compact('registrations', 'stats'));
    }

    /**
     * Display the specified registration
     */
    public function show(PpdbRegistration $ppdb): View
    {
        return view('admin.ppdb.show', compact('ppdb'));
    }

    /**
     * Show the form for editing the registration
     */
    public function edit(PpdbRegistration $ppdb): View
    {
        return view('admin.ppdb.edit', compact('ppdb'));
    }

    /**
     * Update the specified registration
     */
    public function update(Request $request, PpdbRegistration $ppdb): RedirectResponse
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'nisn' => 'required|string|max:20',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'sekolah_asal' => 'required|string|max:100',
            'alamat_sekolah' => 'required|string',
            'jenjang' => 'required|in:smk,smp,sma',
            'jurusan' => 'nullable|string|max:50',
            'status' => 'required|in:pending,diterima,ditolak',
            'catatan' => 'nullable|string',
        ]);

        $ppdb->update($validated);

        return redirect()
            ->route('admin.ppdb.show', $ppdb)
            ->with('success', 'Data pendaftaran berhasil diperbarui.');
    }

    /**
     * Update status only
     */
    public function updateStatus(Request $request, PpdbRegistration $ppdb): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,diterima,ditolak',
            'catatan' => 'nullable|string',
        ]);

        $ppdb->update($validated);

        return back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    /**
     * Bulk update status
     */
    public function bulkUpdate(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:ppdb_registrations,id',
            'status' => 'required|in:pending,diterima,ditolak',
        ]);

        PpdbRegistration::whereIn('id', $validated['ids'])
            ->update(['status' => $validated['status']]);

        return back()->with('success', count($validated['ids']) . ' data berhasil diperbarui.');
    }

    /**
     * Remove the specified registration
     */
    public function destroy(PpdbRegistration $ppdb): RedirectResponse
    {
        $ppdb->delete();

        return redirect()
            ->route('admin.ppdb.index')
            ->with('success', 'Data pendaftaran berhasil dihapus.');
    }

    /**
     * Export registrations
     */
    public function export(Request $request)
    {
        // TODO: Implement export functionality
        return back()->with('info', 'Fitur export akan segera tersedia.');
    }
}
