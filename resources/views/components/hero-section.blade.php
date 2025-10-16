{{-- Hero Section --}}
<section 
  id="hero"
  class="relative h-[95vh] w-full overflow-hidden flex items-center justify-center bg-black"
>
  <!-- Parallax Background -->
  <!-- Hero Background -->
<div id="hero-bg" class="absolute inset-0 bg-cover bg-center will-change-transform">
  <video 
    id="hero-video" 
    autoplay 
    loop 
    muted 
    playsinline 
    preload="none" 
    poster="/images/hero-thumb.jpg" 
    class="w-full h-full object-cover object-center"
  >
    <source src="{{ asset('videos/citra-negara.mp4') }}" type="video/mp4">
  </video>
</div>

<!-- Tombol Audio -->
<button 
  id="audioToggleBtn" 
  class="absolute bottom-6 right-6 z-50 flex items-center gap-2
         bg-white/60 backdrop-blur-md text-[#699D15] font-semibold 
         px-5 py-2.5 rounded-full shadow-lg border border-white/40
         hover:bg-[#7CB518] hover:text-white hover:shadow-[0_0_20px_rgba(124,181,24,0.6)]
         transition-all duration-300 active:scale-95"
>
  🔇 Aktifkan Audio
</button>

  <!-- Gradient Overlay -->
  <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-[#C3E956]/10"></div>

  <!-- Floating Particles -->
  @php
    $top = rand(5, 95);
    $left = rand(5, 95);
    $size = rand(6, 12);
    $delay = rand(0, 10) / 10;
  @endphp

  <div
    class="absolute rounded-full bg-white/20 blur-md animate-[float_10s_ease-in-out_infinite]"
    style="top: {{ $top }}%; left: {{ $left }}%; width: {{ $size }}px; height: {{ $size }}px; animation-delay: {{ $delay }}s;"
  ></div>

  <!-- Hero Content -->
  <div class="relative z-10 text-center px-6" data-aos="zoom-in" data-aos-duration="1200">
    <h1 class="text-5xl md:text-7xl text-[#699D15] font-extrabold tracking-wider drop-shadow-[0_0_25px_rgba(195,233,86,0.5)] animate-[fadeDown_1s_ease-out_forwards]">
      CITRA NEGARA
    </h1>
    
    <p class="mt-4 text-lg md:text-2xl font-semibold text-[#699D15] tracking-widest animate-[fadeUp_1.2s_ease-out_forwards]">
      <span class="text-white"> MUTU </span>|<span class="text-white"> AMANAH </span>|<span class="text-white"> NYAMAN </span>|<span class="text-white"> AKTIF </span>|<span class="text-white"> PROFESIONAL</span>
    </p>

    <!-- Jenjang Sekolah -->
    <div class="mt-6 flex justify-center animate-[fadeUp_1.4s_ease-out_forwards]">
      <span class="inline-flex items-center gap-2 bg-[#699D15] text-white px-6 py-2 rounded font-semibold text-lg shadow-lg hover:scale-105 transition-all">
        SMP - SMA - SMK
      </span>
    </div>
  </div>
  <!-- Bottom Fade -->
  <div class="absolute bottom-0 left-0 w-full h-40 bg-gradient-to-t from-white/10 to-transparent"></div>
</section>

@push('styles')
<style>
@keyframes shine {
  0% { transform: translateX(-100%) rotate(45deg); }
  100% { transform: translateX(200%) rotate(45deg); }
}
@keyframes float {
  0%, 100% { transform: translateY(0); opacity: 0.8; }
  50% { transform: translateY(-25px); opacity: 1; }
}
@keyframes fadeDown {
  0% { opacity: 0; transform: translateY(-50px); }
  100% { opacity: 1; transform: translateY(0); }
}
@keyframes fadeUp {
  0% { opacity: 0; transform: translateY(50px); }
  100% { opacity: 1; transform: translateY(0); }
}
</style>
@endpush

@push('scripts')
<script>
  window.addEventListener('scroll', () => {
    const bg = document.getElementById('hero-bg');
    if (!bg) return; // biar aman kalau elemen nggak ketemu

    const scrollY = window.scrollY;
    const speed = 0.4;
    bg.style.transform = `translateY(${scrollY * speed}px) scale(1.1)`;
  });

  const video = document.getElementById('hero-video');
  const btn = document.getElementById('audioToggleBtn');

  btn.addEventListener('click', () => {
    // toggle mute/unmute
    video.muted = !video.muted;

    // pastikan video tetap jalan
    video.play();

    // ubah tampilan tombol sesuai status
    if (video.muted) {
      btn.innerHTML = '🔇 Aktifkan Audio';
    } else {
      btn.innerHTML = '🔊 Matikan Audio';
    }
  });
</script>
@endpush

