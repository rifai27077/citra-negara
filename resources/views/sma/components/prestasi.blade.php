<section class="py-20 px-6 min-h-[600px] bg-[#f7f7f7] overflow-hidden relative" id="prestasi">
  <div class="max-w-7xl mx-auto text-center mb-12">
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-4 animate-fadeIn">
      Prestasi <span class="text-[#7CB518]">SMA Citra Negara</span>
    </h2>
    <p class="text-gray-600 max-w-2xl mx-auto mt-4 text-base md:text-lg">
      Inilah deretan prestasi membanggakan siswa-siswi SMA Citra Negara
      sebagai wujud kerja keras, semangat, dan dedikasi dalam berbagai bidang akademik dan non-akademik.
    </p>
  </div>

  <!-- Carousel Container -->
  <div class="relative max-w-[95vw] md:max-w-[90vw] mx-auto">
    @php
      $prestasis = \App\Models\Prestasi::where('category', 'SMA')->latest('date')->take(6)->get();
    @endphp

    <div class="scroll-track flex gap-6 md:gap-10">
      <!-- Loop utama -->
      <div class="scroll-group flex gap-6 md:gap-10">
        @forelse ($prestasis as $item)
          <div class="flex-shrink-0 w-[75vw] sm:w-[60vw] md:w-[398px] bg-white rounded-2xl shadow-md border border-gray-100 transition-all duration-300">
            <img 
              src="{{ $item->image ? asset('storage/' . $item->image) : asset('/images/placeholder.jpg') }}" 
              alt="{{ $item->title }}"
              loading="lazy" decoding="async"
              class="w-full h-[300px] sm:h-[400px] md:h-[497px] object-cover rounded-t-2xl"
            />
            <div class="p-4 md:p-5 text-center">
              <p class="text-base md:text-lg font-semibold text-gray-800">{{ $item->title }}</p>
              <p class="text-xs md:text-sm text-gray-500 mt-1">{!! strip_tags($item->description) !!}</p>
            </div>
          </div>
        @empty
          <div class="p-10 text-gray-500">Belum ada data prestasi.</div>
        @endforelse
      </div>

      <!-- Duplikat agar loop tanpa putus -->
      <div class="scroll-group flex gap-6 md:gap-10">
        @foreach ($prestasis as $item)
          <div class="flex-shrink-0 w-[75vw] sm:w-[60vw] md:w-[398px] bg-white rounded-2xl shadow-md border border-gray-100 transition-all duration-300">
            <img 
               src="{{ $item->image ? asset('storage/' . $item->image) : asset('/images/placeholder.jpg') }}" 
              alt="{{ $item->title }}"
              loading="lazy" decoding="async"
              class="w-full h-[300px] sm:h-[400px] md:h-[497px] object-cover rounded-t-2xl"
            />
            <div class="p-4 md:p-5 text-center">
               <p class="text-base md:text-lg font-semibold text-gray-800">{{ $item->title }}</p>
              <p class="text-xs md:text-sm text-gray-500 mt-1">{!! strip_tags($item->description) !!}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

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