@extends('layouts.app')

@section('title', 'Berita & Informasi Terkini - Citra Negara')
@section('meta_description', 'Kumpulan berita terbaru, informasi kegiatan, prestasi, dan acara di lingkungan SMK, SMA, dan SMP Citra Negara. Tetap update dengan perkembangan sekolah.')
@section('meta_keywords', 'Berita Citra Negara, Informasi Sekolah, Kegiatan Sekolah, Prestasi Siswa, Grand Opening, PPDB, Seminar Pendidikan')

@section('content')
<section id="all-news" class="relative py-24 px-6 bg-[#f7f7f7] overflow-hidden">
  <div class="absolute inset-0 opacity-20 bg-[url('/images/pattern-light.svg')] bg-repeat"></div>
  <div class="absolute top-0 left-0 w-80 h-80 bg-[#E9DC00]/20 rounded-full blur-3xl"></div>
  <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>

  <div class="max-w-7xl mx-auto relative z-10">

    <!-- Judul Halaman -->
    <div class="text-center mb-14">
      <h3 class="text-3xl md:text-4xl font-extrabold text-[#7CB518] leading-snug">
        Semua Berita Citra Negara
      </h3>
      <p class="text-gray-800 text-base md:text-lg mt-5 max-w-3xl mx-auto leading-relaxed">
        Kumpulan informasi terbaru seputar kegiatan, prestasi, dan acara di lingkungan SMK Citra Negara.
      </p>
    </div>

    <!-- Daftar Semua Berita -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($beritas as $item)
      <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 flex flex-col h-full border border-gray-100">
        <div class="relative h-48 overflow-hidden group">
          <img 
            src="{{ $item->image ? asset('storage/' . $item->image) : asset('img/placeholder.jpg') }}" 
            alt="{{ $item->title }}" 
            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
          >
          <div class="absolute top-4 right-4 bg-[#7CB518] text-white px-3 py-1 rounded-full text-xs font-bold shadow-md">
            {{ $item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y') }}
          </div>
        </div>
        <div class="p-6 flex flex-col flex-grow">
          <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 hover:text-[#7CB518] transition-colors break-words">
            <a href="{{ route('berita.show', $item->slug) }}">
              {{ $item->title }}
            </a>
          </h3>
          <div class="text-gray-600 mb-4 line-clamp-3 text-sm flex-grow break-words">
            {!! Str::limit(strip_tags($item->content), 100) !!}
          </div>
          <a href="{{ route('berita.show', $item->slug) }}" class="inline-flex items-center text-[#7CB518] font-semibold tracking-wide hover:underline mt-auto group">
            Baca Selengkapnya
            <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
          </a>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-12">
      {{ $beritas->links() }}
    </div>

    <!-- Tombol Kembali -->
    <div class="text-center mt-16" data-aos="fade-in" data-aos-delay="400">
      <a href="/" class="inline-block bg-[#699D15] text-white font-semibold text-lg px-8 py-3 rounded-full shadow-lg transition-all duration-300 hover:bg-[#7CB518] hover:shadow-[0_0_25px_rgba(124,181,24,0.5)] active:scale-95">
        Kembali ke Beranda
      </a>
    </div>

  </div>
</section>
@endsection
