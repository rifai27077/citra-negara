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
    @php
      $news = [
        ['img' => '/images/berita1.png', 'title' => 'Grand Opening SMK Citra Negara 2025', 'date' => '25 Agustus 2025', 'link' => '/berita/grand-opening'],
        ['img' => '/images/berita2.jpg', 'title' => 'PPDB SMK-SMA Citra Negara', 'date' => '1 September 2025', 'desc' => '', 'link' => '/berita/ppdb-smksma'],
        ['img' => '/images/berita3.jpg', 'title' => 'Seminar', 'date' => '12 Agustus 2025', 'desc' => '', 'link' => '/berita/seminar'],
      ];
    @endphp

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10" data-aos="fade-in" data-aos-delay="200">
      @foreach ($news as $item)
        <div class="group relative rounded-2xl overflow-hidden bg-white shadow-lg hover:shadow-2xl transition-all duration-700">
          <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent opacity-70 group-hover:opacity-90 transition"></div>
          <div class="absolute bottom-0 p-5 text-white">
            <p class="text-sm opacity-80">{{ $item['date'] }}</p>
            <h4 class="font-bold text-lg mb-2">{{ $item['title'] }}</h4>
            <a href="{{ $item['link'] }}" class="inline-block bg-[#699D15] hover:bg-[#7CB518] text-white px-4 py-1.5 rounded-full text-sm font-semibold shadow transition-all duration-300">
              Selengkapnya
            </a>
          </div>
        </div>
      @endforeach
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
