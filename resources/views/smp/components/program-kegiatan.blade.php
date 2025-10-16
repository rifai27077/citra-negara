<section class="py-20 px-6 bg-[#f7f7f7] relative" id="program-seluruh-kelas" data-aos="fade-up" data-aos-duration="1000">
  <div class="max-w-7xl mx-auto text-center">
    <h2 class="text-3xl text-[#7CB518] md:text-4xl font-extrabold mb-10">
      Program Kegiatan Seluruh Kelas
    </h2>

    <div class="relative">
      <!-- Tombol kiri -->
      <button id="scrollLeft" 
        class="absolute left-0 top-1/2 -translate-y-1/2 bg-[#7CB518] text-white p-3 rounded-full shadow-lg hover:bg-[#8DC63F] disabled:opacity-40 disabled:cursor-not-allowed z-20 transition-all duration-200">
        <i class="fa-solid fa-chevron-left"></i>
      </button>

      <!-- Container Scroll -->
      <div id="programScroll" 
           class="flex overflow-x-auto scroll-smooth no-scrollbar gap-6 px-12 py-4">
        
        <!-- Card -->
        <div class="bg-white border border-[#7CB518]/30 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 w-[200px] h-[200px] flex flex-col justify-center items-center text-center flex-shrink-0">
          <h3 class="text-lg font-bold text-[#7CB518] mb-2">Dhuha</h3>
          <p class="text-gray-600 text-sm">Ibadah pagi untuk membentuk karakter disiplin & ikhlas.</p>
        </div>

        <div class="bg-white border border-[#7CB518]/30 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 w-[200px] h-[200px] flex flex-col justify-center items-center text-center flex-shrink-0">
          <h3 class="text-lg font-bold text-[#7CB518] mb-2">Tadarus</h3>
          <p class="text-gray-600 text-sm">Membaca Al-Qur’an bersama tiap pagi.</p>
        </div>

        <div class="bg-white border border-[#7CB518]/30 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 w-[200px] h-[200px] flex flex-col justify-center items-center text-center flex-shrink-0">
          <h3 class="text-lg font-bold text-[#7CB518] mb-2">Muraja’ah</h3>
          <p class="text-gray-600 text-sm">Mengulang hafalan surat-surat pendek.</p>
        </div>

        <div class="bg-white border border-[#7CB518]/30 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 w-[200px] h-[200px] flex flex-col justify-center items-center text-center flex-shrink-0">
          <h3 class="text-lg font-bold text-[#7CB518] mb-2">Yasinan</h3>
          <p class="text-gray-600 text-sm">Membaca Yasin & doa bersama setiap Jumat.</p>
        </div>

        <div class="bg-white border border-[#7CB518]/30 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 w-[200px] h-[200px] flex flex-col justify-center items-center text-center flex-shrink-0">
          <h3 class="text-lg font-bold text-[#7CB518] mb-2">Tahfiz</h3>
          <p class="text-gray-600 text-sm">Menghafal dan memperkuat hafalan Al-Qur’an.</p>
        </div>

        <div class="bg-white border border-[#7CB518]/30 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 w-[200px] h-[200px] flex flex-col justify-center items-center text-center flex-shrink-0">
          <h3 class="text-lg font-bold text-[#7CB518] mb-2">English Day</h3>
          <p class="text-gray-600 text-sm">Berbicara full English dengan fun activities.</p>
        </div>

        <div class="bg-white border border-[#7CB518]/30 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 w-[200px] h-[200px] flex flex-col justify-center items-center text-center flex-shrink-0">
          <h3 class="text-lg font-bold text-[#7CB518] mb-2">CN Tech</h3>
          <p class="text-gray-600 text-sm">Eksplor dunia teknologi & coding.</p>
        </div>

        <div class="bg-white border border-[#7CB518]/30 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 w-[200px] h-[200px] flex flex-col justify-center items-center text-center flex-shrink-0">
          <h3 class="text-lg font-bold text-[#7CB518] mb-2">Cooking & Baking</h3>
          <p class="text-gray-600 text-sm">Belajar masak & berkreasi kuliner.</p>
        </div>
      </div>

      <!-- Tombol kanan -->
      <button id="scrollRight" 
        class="absolute right-0 top-1/2 -translate-y-1/2 bg-[#7CB518] text-white p-3 rounded-full shadow-lg hover:bg-[#8DC63F] disabled:opacity-40 disabled:cursor-not-allowed z-20 transition-all duration-200">
        <i class="fa-solid fa-chevron-right"></i>
      </button>
    </div>

    <p class="mt-6 text-gray-500 text-sm">Geser untuk melihat kegiatan lainnya</p>
  </div>

  <style>
    .no-scrollbar::-webkit-scrollbar {
      display: none;
    }
    .no-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }
  </style>

  <script>
    const container = document.getElementById('programScroll');
    const leftBtn = document.getElementById('scrollLeft');
    const rightBtn = document.getElementById('scrollRight');

    const scrollAmount = 300; // geser tiap klik sejauh 300px

    // Fungsi untuk update status tombol
    function updateButtons() {
      leftBtn.disabled = container.scrollLeft <= 0;
      rightBtn.disabled = container.scrollLeft + container.clientWidth >= container.scrollWidth - 1;
    }

    // Scroll kiri-kanan
    leftBtn.addEventListener('click', () => {
      container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });
    rightBtn.addEventListener('click', () => {
      container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });

    // Update tombol tiap kali scroll
    container.addEventListener('scroll', updateButtons);

    // Cek posisi awal
    window.addEventListener('load', updateButtons);
  </script>
</section>
