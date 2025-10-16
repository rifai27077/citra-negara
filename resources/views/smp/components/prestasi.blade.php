<section class="py-20 px-6 min-h-[600px] overflow-hidden relative" id="prestasi">
  <div class="max-w-7xl mx-auto text-center mb-12">
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-4 animate-fadeIn">
      Prestasi <span class="text-[#7CB518]">SMP Citra Negara</span>
    </h2>
    <p class="text-gray-600 max-w-2xl mx-auto mt-4 text-base md:text-lg">
      Inilah deretan prestasi membanggakan siswa-siswi SMP Citra Negara
      sebagai wujud kerja keras, semangat, dan dedikasi dalam berbagai bidang keahlian.
    </p>
  </div>

  <!-- Carousel Container -->
  <div class="relative max-w-[95vw] md:max-w-[90vw] mx-auto">
    <div class="scroll-track flex gap-6 md:gap-10">
      <!-- Loop utama -->
      <div class="scroll-group flex gap-6 md:gap-10">
        @foreach ([
          ['file' => 'p1.jpg', 'judul' => 'Juara 1 Lomba Robotik', 'desc' => 'Tingkat Nasional 2024'],
          ['file' => 'p2.jpg', 'judul' => 'Desain Web Terbaik', 'desc' => 'LKS SMK Provinsi Jawa Barat'],
          ['file' => 'p3.jpg', 'judul' => 'Inovasi Produk PKK', 'desc' => 'Pameran Kewirausahaan 2025'],
          ['file' => 'p4.jpg', 'judul' => 'Inovasi Produk PKK', 'desc' => 'Pameran Kewirausahaan 2025'],
        ] as $item)
          <div class="flex-shrink-0 w-[75vw] sm:w-[60vw] md:w-[398px] bg-white rounded-2xl shadow-md border border-gray-100 transition-all duration-300">
            <img 
              src="{{ asset('/images/smp/' . $item['file']) }}" 
              alt="{{ $item['judul'] }}"
              loading="lazy" decoding="async"
              class="w-full h-[300px] sm:h-[400px] md:h-[497px] object-cover rounded-t-2xl"
            />
            <div class="p-4 md:p-5 text-center">
              <p class="text-base md:text-lg font-semibold text-gray-800">{{ $item['judul'] }}</p>
              <p class="text-xs md:text-sm text-gray-500 mt-1">{{ $item['desc'] }}</p>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Duplikat agar loop tanpa putus -->
      <div class="scroll-group flex gap-6 md:gap-10">
        @foreach ([
          ['file' => 'p1.jpg', 'judul' => 'Juara 1 Lomba Robotik', 'desc' => 'Tingkat Nasional 2024'],
          ['file' => 'p2.jpg', 'judul' => 'Desain Web Terbaik', 'desc' => 'LKS SMK Provinsi Jawa Barat'],
          ['file' => 'p3.jpg', 'judul' => 'Inovasi Produk PKK', 'desc' => 'Pameran Kewirausahaan 2025'],
          ['file' => 'p4.jpg', 'judul' => 'Inovasi Produk PKK', 'desc' => 'Pameran Kewirausahaan 2025'],
        ] as $item)
          <div class="flex-shrink-0 w-[75vw] sm:w-[60vw] md:w-[398px] bg-white rounded-2xl shadow-md border border-gray-100 transition-all duration-300">
            <img 
              src="{{ asset('/images/smp/' . $item['file']) }}" 
              alt="{{ $item['judul'] }}"
              loading="lazy" decoding="async"
              class="w-full h-[300px] sm:h-[400px] md:h-[497px] object-cover rounded-t-2xl"
            />
            <div class="p-4 md:p-5 text-center">
              <p class="text-base md:text-lg font-semibold text-gray-800">{{ $item['judul'] }}</p>
              <p class="text-xs md:text-sm text-gray-500 mt-1">{{ $item['desc'] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- <div class="text-center mt-14">
    <a href="{{ url('/prestasi') }}" 
      class="inline-flex items-center px-6 sm:px-8 py-3 bg-[#7CB518] text-white font-semibold text-sm sm:text-base rounded-full shadow-md hover:bg-[#6aa215] hover:shadow-lg transition-all duration-300">
      Lihat Prestasi Lainnya <span class="ml-2">→</span>
    </a>
  </div> -->

  <!-- Scroll Animation -->
  <style>
    @keyframes scroll {
      from { transform: translateX(0); }
      to { transform: translateX(-50%); }
    }

    .scroll-track {
      display: flex;
      width: max-content;
      animation: scroll 25s linear infinite;
    }

    .scroll-group {
      display: flex;
    }

    /* Pause animation saat hover (desktop only) */
    @media (hover: hover) {
      .scroll-track:hover {
        animation-play-state: paused;
      }
    }
  </style>
</section>