<section class="relative py-20 px-6 bg-gradient-to-b from-[#F5F6F7] to-white overflow-hidden" id="sekolah" data-aos="fade-up" data-aos-duration="1000">
  <!-- Dekorasi -->
  <div class="absolute -top-10 -right-10 w-64 h-64 bg-[#8DC63F]/10 rounded-full blur-3xl"></div>
  <div class="absolute bottom-0 left-0 w-72 h-72 bg-primary/10 rounded-full blur-3xl"></div>

  <div class="max-w-7xl mx-auto text-center relative z-10">
    <h2 class="text-3xl md:text-4xl font-extrabold text-primary mb-3">
      Jelajahi Unit Pendidikan Kami
    </h2>
    <p class="text-base md:text-lg text-gray-600 mb-14">
      Temukan jenjang pendidikan terbaik untuk mengasah potensi dan menyiapkan masa depan gemilang.
    </p>

    <!-- 🔧 Grid diperbaiki -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10 justify-items-center">
      @foreach ([
        ['title' => 'SMP', 'img' => '/images/u-smp.png', 'desc' => 'Bangun pondasi akademik yang kuat dengan lingkungan yang mendukung dan inovatif.', 'link' => '/smp'],
        ['title' => 'SMA', 'img' => '/images/u-sma.png', 'desc' => 'Kembangkan potensi akademik dan karakter untuk melangkah ke jenjang berikutnya.', 'link' => '/sma'],
        ['title' => 'SMK', 'img' => '/images/u-smk.png', 'desc' => 'Siap kerja, siap wirausaha, dan siap kuliah dengan keahlian yang terarah.', 'link' => '/smk'],
      ] as $unit)
      <div class="relative group w-full sm:w-72 md:w-80 lg:w-80 perspective" data-aos="zoom-in">
        <div class="tilt-card bg-white rounded-3xl shadow-lg overflow-hidden transition-all duration-500 hover:shadow-2xl">
          <div class="tilt-inner relative will-change-transform">
            <div class="relative overflow-hidden rounded-t-3xl">
              <img src="{{ $unit['img'] }}" alt="{{ $unit['title'] }}" class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-110">
              <div class="absolute inset-0 bg-gradient-to-t from-[#7CB518]/70 via-transparent opacity-0 group-hover:opacity-100 transition-all duration-700"></div>
            </div>
            <div class="shine absolute inset-0 rounded-3xl pointer-events-none opacity-0 group-hover:opacity-30 transition-opacity duration-500"></div>

            <div class="p-6 flex flex-col items-center space-y-3 bg-white rounded-b-3xl">
              <h3 class="text-2xl font-extrabold text-gray-700">{{ $unit['title'] }}</h3>
              <p class="text-gray-600 text-sm text-center">{{ $unit['desc'] }}</p>
              <a href="{{ $unit['link'] }}" class="mt-4 text-white font-semibold px-8 py-2 rounded-full shadow-md hover:shadow-lg transition hover:opacity-90 bg-primary">
                Lihat Selengkapnya
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const cards = document.querySelectorAll('.tilt-card');
  cards.forEach(card => {
    const inner = card.querySelector('.tilt-inner');
    const shine = card.querySelector('.shine');

    card.addEventListener('mousemove', e => {
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;

      const rotateX = ((y - centerY) / 20).toFixed(2);
      const rotateY = ((centerX - x) / 20).toFixed(2);
      inner.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;

      const shineX = (x / rect.width) * 100;
      const shineY = (y / rect.height) * 100;
      shine.style.background = `radial-gradient(circle at ${shineX}% ${shineY}%, rgba(255,255,255,0.7), transparent 70%)`;
      shine.style.opacity = 0.3;
    });

    card.addEventListener('mouseleave', () => {
      inner.style.transform = 'rotateX(0deg) rotateY(0deg)';
      shine.style.opacity = 0;
    });
  });
});
</script>

<style>
  .perspective {
    perspective: 800px;
  }
  .tilt-card {
    transform-style: preserve-3d;
    cursor: pointer;
    position: relative;
    overflow: hidden;
  }
  .tilt-inner {
    transform-origin: center;
    transition: transform 0.25s ease;
    will-change: transform;
  }
  .shine {
    position: absolute;
    inset: 0;
    border-radius: 1.5rem;
    mix-blend-mode: overlay;
    transition: opacity 0.3s ease;
  }
</style>
@endpush
