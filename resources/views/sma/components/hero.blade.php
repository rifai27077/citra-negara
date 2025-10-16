<section 
  class="relative h-[95vh] min-h-[600px] w-full flex items-center justify-center bg-[url('/images/hero-fallback.jpg')] bg-cover bg-center">  
  <div class="absolute inset-0 w-full h-full z-0">
    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/20 to-black/60"></div>
    <video autoplay loop muted playsinline preload="none" poster="/images/thumb.webp" class="w-full h-full object-cover object-center">
      <source src="{{ asset('videos/sma.mp4') }}" type="video/mp4">
    </video>
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
  </div>
  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 flex flex-col items-center justify-center min-h-[400px]" style="min-height:400px;">
    <div class="w-full md:w-2/3 mx-auto text-center" data-aos="zoom-in" data-aos-delay="50">
      <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-4">
        Selamat Datang di <span class="text-[#7CB518] rounded">SMA Citra Negara</span>
      </h1>
      <p class="text-white text-lg mb-6">
        Membangun generasi cerdas, berkarakter, dan berwawasan global melalui pendidikan yang inspiratif dan berintegritas.
      </p>
    </div>
  </div>
</section>