@extends('layouts.app')

@section('title', 'Berita - Citra Negara')

@section('content')
<section class="relative py-24 px-6 bg-[#f7f7f7] overflow-hidden">
  <div class="absolute inset-0 opacity-20 bg-[url('/images/pattern-light.svg')] bg-repeat"></div>
  <div class="max-w-5xl mx-auto relative z-10">



    <!-- Breadcrumbs -->
    <nav class="flex mb-4 text-sm text-gray-500" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <a href="/" class="inline-flex items-center hover:text-[#7CB518]">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
            Beranda
          </a>
        </li>
        <li>
          <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <a href="{{ route('berita.index') }}" class="ml-1 md:ml-2 hover:text-[#7CB518]">Berita</a>
          </div>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <span class="ml-1 md:ml-2 text-gray-400 truncate max-w-xs">{{ $berita->title }}</span>
          </div>
        </li>
      </ol>
    </nav>

    <!-- Judul dan Info -->
    <h1 class="text-4xl font-extrabold text-[#7CB518] mb-3">{{ $berita->title }}</h1>
    <p class="text-gray-600 text-sm mb-8">{{ $berita->published_at ? $berita->published_at->format('d M Y') : $berita->created_at->format('d M Y') }}</p>
    
    <!-- Image -->
    @if($berita->image)
        <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->title }}" class="w-full h-auto rounded-xl shadow-lg mb-8">
    @endif

    <!-- Isi Berita -->
    <div class="text-gray-800 leading-relaxed text-lg space-y-6 prose prose-lg max-w-none break-words [&>img]:rounded-xl [&>img]:shadow-lg">
      {!! $berita->content !!}
    </div>

    <!-- Tombol Kembali -->
     <div class="flex justify-center gap-4">
        <div class="mt-12 text-center">
        <a href="/berita" class="inline-block bg-[#699D15] hover:bg-[#7CB518] text-white px-8 py-3 rounded-full font-semibold shadow-lg transition-all duration-300 active:scale-95">
            lihat berita lainnya
        </a>
        </div>

        <div class="mt-12 text-center">
        <a href="/" class="inline-block bg-[#699D15] hover:bg-[#7CB518] text-white px-8 py-3 rounded-full font-semibold shadow-lg transition-all duration-300 active:scale-95">
            Kembali ke beranda
        </a>
        </div>
     </div>

  </div>
</section>
@endsection
