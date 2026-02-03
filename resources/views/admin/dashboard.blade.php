@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl p-6 text-white">
        <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ auth()->user()->name }}! 👋</h2>
        <p class="text-primary-100">Berikut ringkasan data PPDB dan konten website Citra Negara.</p>
    </div>
    
    <!-- PPDB Statistics -->
    <div>
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Statistik PPDB</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Total Pendaftar -->
            <div class="stat-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Pendaftar</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">{{ $ppdbStats['total'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-users text-primary-600 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <!-- Pending -->
            <div class="stat-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Menunggu</p>
                        <p class="text-3xl font-bold text-yellow-600 mt-1">{{ $ppdbStats['pending'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-clock text-yellow-600 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <!-- Diterima -->
            <div class="stat-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Diterima</p>
                        <p class="text-3xl font-bold text-green-600 mt-1">{{ $ppdbStats['diterima'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <!-- Ditolak -->
            <div class="stat-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Ditolak</p>
                        <p class="text-3xl font-bold text-red-600 mt-1">{{ $ppdbStats['ditolak'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-times-circle text-red-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Per Jenjang Statistics -->
    <div>
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Pendaftar per Jenjang</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- SMK -->
            <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-primary-500">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-tools text-primary-600 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">SMK</h4>
                        <p class="text-sm text-gray-500">Sekolah Menengah Kejuruan</p>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-2 text-center">
                    <div class="bg-gray-50 rounded-lg p-2">
                        <p class="text-2xl font-bold text-gray-900">{{ $ppdbPerJenjang['smk']['total'] }}</p>
                        <p class="text-xs text-gray-500">Total</p>
                    </div>
                    <div class="bg-yellow-50 rounded-lg p-2">
                        <p class="text-2xl font-bold text-yellow-600">{{ $ppdbPerJenjang['smk']['pending'] }}</p>
                        <p class="text-xs text-gray-500">Pending</p>
                    </div>
                    <div class="bg-green-50 rounded-lg p-2">
                        <p class="text-2xl font-bold text-green-600">{{ $ppdbPerJenjang['smk']['diterima'] }}</p>
                        <p class="text-xs text-gray-500">Diterima</p>
                    </div>
                </div>
                <a href="{{ route('admin.ppdb.index', ['jenjang' => 'smk']) }}" 
                   class="mt-4 block text-center text-sm text-primary-600 hover:text-primary-700 font-medium">
                    Lihat Detail →
                </a>
            </div>
            
            <!-- SMA -->
            <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-blue-500">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">SMA</h4>
                        <p class="text-sm text-gray-500">Sekolah Menengah Atas</p>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-2 text-center">
                    <div class="bg-gray-50 rounded-lg p-2">
                        <p class="text-2xl font-bold text-gray-900">{{ $ppdbPerJenjang['sma']['total'] }}</p>
                        <p class="text-xs text-gray-500">Total</p>
                    </div>
                    <div class="bg-yellow-50 rounded-lg p-2">
                        <p class="text-2xl font-bold text-yellow-600">{{ $ppdbPerJenjang['sma']['pending'] }}</p>
                        <p class="text-xs text-gray-500">Pending</p>
                    </div>
                    <div class="bg-green-50 rounded-lg p-2">
                        <p class="text-2xl font-bold text-green-600">{{ $ppdbPerJenjang['sma']['diterima'] }}</p>
                        <p class="text-xs text-gray-500">Diterima</p>
                    </div>
                </div>
                <a href="{{ route('admin.ppdb.index', ['jenjang' => 'sma']) }}" 
                   class="mt-4 block text-center text-sm text-blue-600 hover:text-blue-700 font-medium">
                    Lihat Detail →
                </a>
            </div>
            
            <!-- SMP -->
            <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-orange-500">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-school text-orange-600 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">SMP</h4>
                        <p class="text-sm text-gray-500">Sekolah Menengah Pertama</p>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-2 text-center">
                    <div class="bg-gray-50 rounded-lg p-2">
                        <p class="text-2xl font-bold text-gray-900">{{ $ppdbPerJenjang['smp']['total'] }}</p>
                        <p class="text-xs text-gray-500">Total</p>
                    </div>
                    <div class="bg-yellow-50 rounded-lg p-2">
                        <p class="text-2xl font-bold text-yellow-600">{{ $ppdbPerJenjang['smp']['pending'] }}</p>
                        <p class="text-xs text-gray-500">Pending</p>
                    </div>
                    <div class="bg-green-50 rounded-lg p-2">
                        <p class="text-2xl font-bold text-green-600">{{ $ppdbPerJenjang['smp']['diterima'] }}</p>
                        <p class="text-xs text-gray-500">Diterima</p>
                    </div>
                </div>
                <a href="{{ route('admin.ppdb.index', ['jenjang' => 'smp']) }}" 
                   class="mt-4 block text-center text-sm text-orange-600 hover:text-orange-700 font-medium">
                    Lihat Detail →
                </a>
            </div>
        </div>
    </div>
    
    <!-- Other Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Berita Stats -->
        <div class="stat-card">
            <div class="flex items-center justify-between mb-4">
                <h4 class="font-semibold text-gray-800">Berita</h4>
                <a href="{{ route('admin.berita.index') }}" class="text-sm text-primary-600 hover:text-primary-700">
                    Kelola →
                </a>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-newspaper text-purple-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900">{{ $beritaStats['total'] }}</p>
                    <p class="text-sm text-gray-500">
                        <span class="text-green-600">{{ $beritaStats['published'] }} published</span> • 
                        <span class="text-gray-400">{{ $beritaStats['draft'] }} draft</span>
                    </p>
                </div>
            </div>
        </div>
        
        <!-- FAQ Stats -->
        <div class="stat-card">
            <div class="flex items-center justify-between mb-4">
                <h4 class="font-semibold text-gray-800">FAQ</h4>
                <a href="{{ route('admin.faq.index') }}" class="text-sm text-primary-600 hover:text-primary-700">
                    Kelola →
                </a>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-question-circle text-blue-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900">{{ $faqStats['total'] }}</p>
                    <p class="text-sm text-gray-500">Total pertanyaan</p>
                </div>
            </div>
        </div>
        
        <!-- User Stats -->
        <div class="stat-card">
            <div class="flex items-center justify-between mb-4">
                <h4 class="font-semibold text-gray-800">Pengguna</h4>
                <a href="{{ route('admin.users.index') }}" class="text-sm text-primary-600 hover:text-primary-700">
                    Kelola →
                </a>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-users text-indigo-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900">{{ $userStats['total'] }}</p>
                    <p class="text-sm text-gray-500">
                        <span class="text-primary-600">{{ $userStats['admin'] }} admin</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Activities -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Registrations -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-4 border-b border-gray-100 flex items-center justify-between">
                <h4 class="font-semibold text-gray-800">Pendaftaran Terbaru</h4>
                <a href="{{ route('admin.ppdb.index') }}" class="text-sm text-primary-600 hover:text-primary-700">
                    Lihat Semua
                </a>
            </div>
            <div class="divide-y divide-gray-100">
                @forelse($recentRegistrations as $reg)
                    <div class="p-4 hover:bg-gray-50 transition-colors">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center">
                                    <i class="fas fa-user text-gray-500"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">{{ $reg->nama_lengkap }}</p>
                                    <p class="text-sm text-gray-500">{{ $reg->sekolah_asal }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full {{ $reg->jenjang_badge }}">
                                    {{ strtoupper($reg->jenjang) }}
                                </span>
                                <p class="text-xs text-gray-400 mt-1">{{ $reg->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center text-gray-500">
                        <i class="fas fa-inbox text-3xl mb-2"></i>
                        <p>Belum ada pendaftaran</p>
                    </div>
                @endforelse
            </div>
        </div>
        
        <!-- Recent Berita -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-4 border-b border-gray-100 flex items-center justify-between">
                <h4 class="font-semibold text-gray-800">Berita Terbaru</h4>
                <a href="{{ route('admin.berita.create') }}" class="text-sm text-primary-600 hover:text-primary-700">
                    + Tambah Berita
                </a>
            </div>
            <div class="divide-y divide-gray-100">
                @forelse($recentBerita as $berita)
                    <div class="p-4 hover:bg-gray-50 transition-colors">
                        <div class="flex items-start gap-3">
                            @if($berita->gambar)
                                <img src="{{ $berita->gambar_url }}" alt="" class="w-16 h-12 object-cover rounded-lg">
                            @else
                                <div class="w-16 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 truncate">{{ $berita->judul }}</p>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $berita->jenjang_badge }}">
                                        {{ ucfirst($berita->jenjang) }}
                                    </span>
                                    @if($berita->is_published)
                                        <span class="text-xs text-green-600"><i class="fas fa-check"></i> Published</span>
                                    @else
                                        <span class="text-xs text-gray-400">Draft</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center text-gray-500">
                        <i class="fas fa-newspaper text-3xl mb-2"></i>
                        <p>Belum ada berita</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
