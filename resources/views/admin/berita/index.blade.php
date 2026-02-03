@extends('layouts.admin')

@section('title', 'Berita')
@section('header', 'Manajemen Berita')

@section('content')
<div class="space-y-6">
    <!-- Header with Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Berita & Artikel</h2>
            <p class="text-gray-500 mt-1">Kelola berita dan artikel website</p>
        </div>
        <a href="{{ route('admin.berita.create') }}" 
           class="inline-flex items-center gap-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">
            <i class="fas fa-plus"></i>
            Tambah Berita
        </a>
    </div>
    
    <!-- Content Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <!-- Jenjang Tabs -->
        <div class="border-b border-gray-200">
            <nav class="flex -mb-px overflow-x-auto" aria-label="Tabs">
                <a href="{{ route('admin.berita.index', array_merge(request()->except('jenjang', 'page'), [])) }}" 
                   class="flex-shrink-0 px-6 py-4 border-b-2 font-medium text-sm transition-colors {{ !request('jenjang') || request('jenjang') === 'semua' ? 'border-primary-500 text-primary-600' : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                    Semua
                    <span class="ml-2 px-2 py-0.5 rounded-full text-xs {{ !request('jenjang') ? 'bg-primary-100 text-primary-600' : 'bg-gray-100 text-gray-600' }}">
                        {{ $stats['semua'] }}
                    </span>
                </a>
                <a href="{{ route('admin.berita.index', array_merge(request()->except('page'), ['jenjang' => 'umum'])) }}" 
                   class="flex-shrink-0 px-6 py-4 border-b-2 font-medium text-sm transition-colors {{ request('jenjang') === 'umum' ? 'border-gray-500 text-gray-700' : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                    Umum
                    <span class="ml-2 px-2 py-0.5 rounded-full text-xs bg-gray-100 text-gray-600">
                        {{ $stats['umum'] }}
                    </span>
                </a>
                <a href="{{ route('admin.berita.index', array_merge(request()->except('page'), ['jenjang' => 'smk'])) }}" 
                   class="flex-shrink-0 px-6 py-4 border-b-2 font-medium text-sm transition-colors {{ request('jenjang') === 'smk' ? 'border-primary-500 text-primary-600' : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                    <span class="inline-flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-primary-500"></span>
                        SMK
                    </span>
                    <span class="ml-2 px-2 py-0.5 rounded-full text-xs bg-gray-100 text-gray-600">
                        {{ $stats['smk'] }}
                    </span>
                </a>
                <a href="{{ route('admin.berita.index', array_merge(request()->except('page'), ['jenjang' => 'sma'])) }}" 
                   class="flex-shrink-0 px-6 py-4 border-b-2 font-medium text-sm transition-colors {{ request('jenjang') === 'sma' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                    <span class="inline-flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                        SMA
                    </span>
                    <span class="ml-2 px-2 py-0.5 rounded-full text-xs bg-gray-100 text-gray-600">
                        {{ $stats['sma'] }}
                    </span>
                </a>
                <a href="{{ route('admin.berita.index', array_merge(request()->except('page'), ['jenjang' => 'smp'])) }}" 
                   class="flex-shrink-0 px-6 py-4 border-b-2 font-medium text-sm transition-colors {{ request('jenjang') === 'smp' ? 'border-orange-500 text-orange-600' : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                    <span class="inline-flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                        SMP
                    </span>
                    <span class="ml-2 px-2 py-0.5 rounded-full text-xs bg-gray-100 text-gray-600">
                        {{ $stats['smp'] }}
                    </span>
                </a>
            </nav>
        </div>
        
        <!-- Filters -->
        <div class="p-4 border-b border-gray-200 bg-gray-50">
            <form action="{{ route('admin.berita.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
                @if(request('jenjang'))
                    <input type="hidden" name="jenjang" value="{{ request('jenjang') }}">
                @endif
                
                <!-- Search -->
                <div class="flex-1">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Cari judul atau konten..."
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none">
                    </div>
                </div>
                
                <!-- Status Filter -->
                <div class="w-full sm:w-40">
                    <select name="status" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none"
                            onchange="this.form.submit()">
                        <option value="" {{ !request('status') ? 'selected' : '' }}>Semua</option>
                        <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>
                
                <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">
                    <i class="fas fa-filter mr-1"></i> Filter
                </button>
            </form>
        </div>
        
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Berita</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Jenjang</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Author</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($berita as $item)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-4">
                                    @if($item->gambar)
                                        <img src="{{ $item->gambar_url }}" alt="" class="w-20 h-14 object-cover rounded-lg">
                                    @else
                                        <div class="w-20 h-14 bg-gray-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-medium text-gray-900 line-clamp-1">{{ $item->judul }}</p>
                                        <p class="text-sm text-gray-500 line-clamp-1">{{ $item->excerpt }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4">
                                @php
                                    $jenjangColors = [
                                        'umum' => 'bg-gray-100 text-gray-700',
                                        'smk' => 'bg-primary-100 text-primary-700',
                                        'sma' => 'bg-blue-100 text-blue-700',
                                        'smp' => 'bg-orange-100 text-orange-700',
                                    ];
                                @endphp
                                <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full {{ $jenjangColors[$item->jenjang] ?? 'bg-gray-100 text-gray-700' }}">
                                    {{ ucfirst($item->jenjang) }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-gray-600">{{ $item->author->name ?? '-' }}</td>
                            <td class="px-4 py-4">
                                @if($item->is_published)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                        <i class="fas fa-check-circle"></i> Published
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-700">
                                        <i class="fas fa-file"></i> Draft
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-500">{{ $item->formatted_date }}</td>
                            <td class="px-4 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <form action="{{ route('admin.berita.toggle-publish', $item) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                class="p-2 text-gray-500 hover:text-{{ $item->is_published ? 'yellow' : 'green' }}-600 hover:bg-{{ $item->is_published ? 'yellow' : 'green' }}-50 rounded-lg transition-colors"
                                                title="{{ $item->is_published ? 'Unpublish' : 'Publish' }}">
                                            <i class="fas fa-{{ $item->is_published ? 'eye-slash' : 'eye' }}"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('admin.berita.edit', $item) }}" 
                                       class="p-2 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.berita.destroy', $item) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-2 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                                                title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <i class="fas fa-newspaper text-3xl text-gray-400"></i>
                                    </div>
                                    <p class="text-gray-500 font-medium">Belum ada berita</p>
                                    <p class="text-gray-400 text-sm mt-1">Klik "Tambah Berita" untuk menambahkan berita baru</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($berita->hasPages())
            <div class="px-4 py-4 border-t border-gray-200">
                {{ $berita->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
