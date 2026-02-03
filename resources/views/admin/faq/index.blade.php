@extends('layouts.admin')

@section('title', 'FAQ')
@section('header', 'Manajemen FAQ')

@section('content')
<div class="space-y-6">
    <!-- Header with Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-gray-900">FAQ (Frequently Asked Questions)</h2>
            <p class="text-gray-500 mt-1">Kelola pertanyaan dan jawaban untuk chatbot</p>
        </div>
        <a href="{{ route('admin.faq.create') }}" 
           class="inline-flex items-center gap-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">
            <i class="fas fa-plus"></i>
            Tambah FAQ
        </a>
    </div>
    
    <!-- Content Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <!-- Filters -->
        <div class="p-4 border-b border-gray-200 bg-gray-50">
            <form action="{{ route('admin.faq.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
                <!-- Search -->
                <div class="flex-1">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Cari pertanyaan atau jawaban..."
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none">
                    </div>
                </div>
                
                <!-- Category Filter -->
                @if($categories->isNotEmpty())
                <div class="w-full sm:w-48">
                    <select name="category" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none"
                            onchange="this.form.submit()">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ request('category') === $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @endif
                
                <!-- Domain Filter -->
                @if($domains->isNotEmpty())
                <div class="w-full sm:w-48">
                    <select name="domain" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none"
                            onchange="this.form.submit()">
                        <option value="">Semua Domain</option>
                        @foreach($domains as $domain)
                            <option value="{{ $domain }}" {{ request('domain') === $domain ? 'selected' : '' }}>
                                {{ $domain }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @endif
                
                <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">
                    <i class="fas fa-filter mr-1"></i> Filter
                </button>
                
                @if(request('search') || request('category') || request('domain'))
                    <a href="{{ route('admin.faq.index') }}" 
                       class="px-4 py-2 text-gray-600 hover:text-gray-800 transition-colors">
                        <i class="fas fa-times mr-1"></i> Reset
                    </a>
                @endif
            </form>
        </div>
        
        <!-- FAQ List -->
        <div class="divide-y divide-gray-200">
            @forelse($faqs as $faq)
                <div class="p-6 hover:bg-gray-50 transition-colors" x-data="{ open: false }">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                @if($faq->category)
                                    <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full bg-blue-100 text-blue-700">
                                        {{ $faq->category }}
                                    </span>
                                @endif
                                @if($faq->domain)
                                    <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full bg-purple-100 text-purple-700">
                                        {{ $faq->domain }}
                                    </span>
                                @endif
                            </div>
                            <button @click="open = !open" 
                                    class="flex items-center gap-2 text-left w-full">
                                <i class="fas fa-chevron-right text-gray-400 transition-transform" :class="{ 'rotate-90': open }"></i>
                                <h4 class="font-medium text-gray-900">{{ $faq->question }}</h4>
                            </button>
                            <div x-show="open" x-collapse class="mt-3 pl-6">
                                <p class="text-gray-600 whitespace-pre-line">{{ $faq->answer }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 flex-shrink-0">
                            <a href="{{ route('admin.faq.edit', $faq) }}" 
                               class="p-2 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                               title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.faq.destroy', $faq) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin ingin menghapus FAQ ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="p-2 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                                        title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-12 text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-question-circle text-3xl text-gray-400"></i>
                    </div>
                    <p class="text-gray-500 font-medium">Belum ada FAQ</p>
                    <p class="text-gray-400 text-sm mt-1">Klik "Tambah FAQ" untuk menambahkan pertanyaan baru</p>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if($faqs->hasPages())
            <div class="px-4 py-4 border-t border-gray-200">
                {{ $faqs->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
