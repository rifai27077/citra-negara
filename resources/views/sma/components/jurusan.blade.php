<section class="py-20 min-h-[600px] px-6 bg-gradient-to-b from-white via-green-50 to-white" id="jurusan">
  <div class="max-w-6xl mx-auto text-center">
    <h3 class="text-3xl md:text-5xl font-extrabold text-gray-800 mb-4 leading-tight" data-aos="fade-down">
      Temukan <span class="text-[#7CB518]">Jurusan Unggulan</span>  
      <br class="hidden md:block" /> 
      di <span class="text-gray-800">SMA Citra Negara</span>
    </h3>
    <p class="text-gray-600 max-w-3xl mx-auto mb-16 text-base md:text-lg" data-aos="fade-up" data-aos-delay="150">
      Dua jurusan utama yang dirancang untuk mengembangkan potensi akademik dan karakter siswa  
      dalam menghadapi tantangan dunia modern dan pendidikan tinggi.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-10">
     @php
      $jurusan = [
        [
          'nama' => 'IPA (Ilmu Pengetahuan Alam)',
          'warna' => 'from-[#0077B6] to-blue-100',
          'img' => '/images/sma/jurusan-ipa.png',
          'desk' => 'Fokus pada penguasaan sains, matematika, dan teknologi untuk membentuk generasi inovatif dan analitis.',
          'text' => 'text-blue-900',
          'border' => 'border-[#0077B6]',
          'link' => 'ipa',
          'comingsoon' => false
        ],
        [
          'nama' => 'IPS (Ilmu Pengetahuan Sosial)',
          'warna' => 'from-[#FFC300] to-yellow-100',
          'img' => '/images/sma/jurusan-ips.png',
          'desk' => 'Mempelajari ekonomi, sejarah, geografi, dan sosiologi untuk melatih kemampuan berpikir kritis dan sosial.',
          'text' => 'text-yellow-800',
          'border' => 'border-[#FFC300]',
          'link' => 'ips',
          'comingsoon' => false
        ],
      ];
     @endphp

     @foreach ($jurusan as $index => $j)
        <div
          class="relative group rounded-2xl bg-gradient-to-br {{ $j['warna'] }} p-8 flex flex-col items-center shadow-xl transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:scale-[1.03]"
          data-aos="fade-up"
          data-aos-delay="{{ 100 + ($index * 100) }}">
          
          <!-- Efek cahaya -->
          <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 bg-white/10 rounded-2xl blur-lg"></div>
          
          <!-- Gambar jurusan -->
          <div class="relative z-10 w-40 h-auto mb-6 flex items-center justify-center">
            <img 
              src="{{ $j['img'] }}" 
              alt="{{ $j['nama'] }}" 
              loading="lazy" decoding="async"
              class="max-w-full max-h-full object-contain transition-transform duration-500 group-hover:scale-110 drop-shadow-lg"
            />
          </div>

          <h4 class="relative z-10 font-extrabold text-xl {{ $j['text'] }} mb-2">{{ $j['nama'] }}</h4>
          <p class="relative z-10 text-sm md:text-base text-center text-black/80 mb-4">{{ $j['desk'] }}</p>
          
          <a href="{{ url('/sma/jurusan/' . strtolower($j['link'])) }}" 
            class="relative z-10 inline-flex items-center px-5 py-2 bg-white {{ $j['border'] }} border text-sm font-semibold rounded-full transition-all duration-300 hover:text-white hover:bg-[#7CB518]">
            Ketahui lebih lanjut <span class="ml-2">→</span>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
