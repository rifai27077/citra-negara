<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PpdbRegistration;
use App\Models\Berita;
use App\Models\Faq;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function index(): View
    {
        // PPDB Statistics
        $ppdbStats = [
            'total' => PpdbRegistration::count(),
            'pending' => PpdbRegistration::pending()->count(),
            'diterima' => PpdbRegistration::diterima()->count(),
            'ditolak' => PpdbRegistration::ditolak()->count(),
        ];

        // Per Jenjang Statistics
        $ppdbPerJenjang = [
            'smk' => [
                'total' => PpdbRegistration::smk()->count(),
                'pending' => PpdbRegistration::smk()->pending()->count(),
                'diterima' => PpdbRegistration::smk()->diterima()->count(),
            ],
            'smp' => [
                'total' => PpdbRegistration::smp()->count(),
                'pending' => PpdbRegistration::smp()->pending()->count(),
                'diterima' => PpdbRegistration::smp()->diterima()->count(),
            ],
            'sma' => [
                'total' => PpdbRegistration::sma()->count(),
                'pending' => PpdbRegistration::sma()->pending()->count(),
                'diterima' => PpdbRegistration::sma()->diterima()->count(),
            ],
        ];

        // Berita Statistics
        $beritaStats = [
            'total' => Berita::count(),
            'published' => Berita::published()->count(),
            'draft' => Berita::where('is_published', false)->count(),
        ];

        // FAQ Statistics
        $faqStats = [
            'total' => Faq::count(),
        ];

        // User Statistics
        $userStats = [
            'total' => User::count(),
            'admin' => User::where('role', 'admin')->count(),
        ];

        // Recent Registrations
        $recentRegistrations = PpdbRegistration::latest()
            ->take(5)
            ->get();

        // Recent Berita
        $recentBerita = Berita::with('author')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'ppdbStats',
            'ppdbPerJenjang',
            'beritaStats',
            'faqStats',
            'userStats',
            'recentRegistrations',
            'recentBerita'
        ));
    }
}
