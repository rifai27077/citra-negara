@extends('layouts.app')

@section('content')
<!-- 404 Page -->
<section class="h-[90vh] flex flex-col items-center justify-center bg-gray-50 px-6 text-center" data-aos="fade-in" data-aos-duration="800">
  <div class="max-w-xl">
    <!-- <img src="/images/404-illustration.svg" alt="404 Illustration" class="w-72 mx-auto mb-8" /> -->

    <h1 class="text-[6rem] md:text-[8rem] font-extrabold text-[#7CB518] leading-none mb-3">404</h1>
    <h2 class="text-2xl md:text-4xl font-bold text-[#111] mb-5">Halaman Tidak Ditemukan</h2>
    <p class="text-[#555] text-base md:text-lg leading-relaxed mb-8">
      Maaf, halaman yang kamu cari tidak tersedia atau mungkin sudah dipindahkan.<br />
      Silakan kembali ke halaman utama atau jelajahi menu lainnya.
    </p>

    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/" class="bg-[#7CB518] hover:bg-[#6aa214] text-white font-semibold text-base md:text-lg px-6 py-3 rounded-xl shadow transition duration-200">
        Kembali ke Beranda
      </a>
      <a href="/kontak" class="border border-[#7CB518] text-[#7CB518] hover:bg-[#7CB518] hover:text-white font-semibold text-base md:text-lg px-6 py-3 rounded-xl shadow transition duration-200">
        Hubungi Kami
      </a>
    </div>
  </div>
</section>
@endsection

