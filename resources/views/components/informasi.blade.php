<section id="news-section" class="relative py-24 px-6 bg-gradient-to-b bg-[#f7f7f7] overflow-hidden">
<div class="absolute inset-0 opacity-20 bg-[url('/images/pattern-light.svg')] bg-repeat"></div>
  <div class="absolute top-0 left-0 w-80 h-80 bg-[#E9DC00]/20 rounded-full blur-3xl"></div>
  <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
  <div class="max-w-7xl mx-auto relative z-10">

    <!-- Judul -->
    <div class="text-center mb-14">
      <h3 class="text-3xl md:text-4xl font-extrabold text-[#7CB518] leading-snug">
        Berita & Kegiatan Terbaru
      </h3>
      <p class="text-gray-600 text-base md:text-lg mt-4 max-w-3xl mx-auto leading-relaxed">
        Ikuti berbagai kegiatan, prestasi, dan informasi terbaru dari lingkungan pendidikan kami.
      </p>

    </div>

    <!-- Layout baru: 1 berita besar + 2 kecil -->
    @php
      $news = [
        ['img' => '/images/berita1.png', 'title' => 'Grand Opening SMK Citra Negara 2025', 'date' => '25 Agustus 2025', 'link' => '/berita/grand-opening'],
        ['img' => '/images/berita2.jpg', 'title' => 'PPDB SMK-SMA Citra Negara', 'date' => '1 September 2025', 'desc' => '', 'link' => '/berita/ppdb-smksma'],
        ['img' => '/images/berita3.jpg', 'title' => 'Seminar', 'date' => '12 Agustus 2025', 'desc' => '', 'link' => '/berita/seminar'],
      ];
    @endphp

    <div class="grid md:grid-cols-3 gap-10 items-stretch" data-aos="fade-up" data-aos-delay="200">
      <!-- Berita utama -->
      <div class="md:col-span-2 group relative rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-700">
        <img src="{{ $news[0]['img'] }}" alt="{{ $news[0]['title'] }}" class="w-full h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>
        <div class="absolute bottom-0 p-8 text-left text-white">
          <p class="text-sm opacity-80 mb-1">{{ $news[0]['date'] }}</p>
          <h3 class="text-2xl md:text-3xl font-extrabold mb-3">{{ $news[0]['title'] }}</h3>
          <p class="hidden md:block text-gray-200 mb-5">{{ $news[0]['desc'] ?? '' }}</p>
          <a href="{{ $news[0]['link'] }}" class="inline-block bg-[#7CB518] hover:bg-[#699D15] text-white px-6 py-2 rounded-full font-semibold shadow-md transition-all duration-300">
            Baca Selengkapnya
          </a>
        </div>
      </div>

      <!-- Dua berita kecil -->
      <div class="flex flex-col gap-8">
        @foreach (array_slice($news, 1) as $item)
          <div class="group relative rounded-2xl overflow-hidden bg-white shadow-lg hover:shadow-2xl transition-all duration-700">
            <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover transition-transform duration-700 group-hover:scale-110">
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
    </div>

    <!-- Tombol Semua Berita -->
    <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="400">
      <a href="/berita" class="inline-block bg-[#699D15] text-white font-semibold text-lg px-8 py-3 rounded-full shadow-lg transition-all duration-300 hover:bg-[#7CB518] hover:shadow-[0_0_25px_rgba(124,181,24,0.5)] active:scale-95">
        Lihat Semua Berita
      </a>
    </div>
  </div>

  <!-- Dekorasi -->
  <div class="absolute top-0 left-0 w-[400px] h-[400px] bg-[#8DC63F]/10 rounded-full blur-3xl animate-[float_10s_ease-in-out_infinite]"></div>
  <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-[#699D15]/10 rounded-full blur-3xl animate-[float_12s_ease-in-out_infinite]"></div>
</section>

@push('scripts')
<style>
@keyframes ticker {
  0% { transform: translateX(100%); }
  100% { transform: translateX(-100%); }
}

@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
}

.animate-[shine_5s_linear_infinite] { background-size: 200% auto; }
</style>
@endpush