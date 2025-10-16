@extends('layouts.app')

@section('title', 'IPA - SMK Citra Negara')

@section('content')
<div class="bg-[#f8f8f8] text-gray-800">

  <!-- Header -->
  <section class="relative flex flex-col items-center overflow-hidden">
    <div class="text-center">
      <div class="flex flex-col md:flex-row items-center justify-start md:p-2 gap-3">
        <h1 class="text-xl md:text-3xl font-extrabold text-[#7CB518]">
          Ilmu Pengetahuan Alam (IPA)
        </h1>
      </div>
    </div>

    <div class="mt-4 items-center">
      <img src="/images/sma/jurusan/ml-ipa.png" loading="lazy" decoding="async" alt="Gambar Ilmu Pengetahuan Alam" class="w-full max-w-sm">
    </div>
  </section>

  <!-- Materi & Deskripsi -->
  <section class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 px-6 py-14">
    <!-- Materi -->
    <div>
      <h2 class="text-xl font-semibold mb-5">Apa saja yang akan dipelajari di IPA?</h2>
      <div class="flex flex-wrap gap-3">
        @php
          $materi = [
            'Fisika',
            'Kimia',
            'Biologi',
            'Matematika',
            'Astronomi',
            'Geologi',
          ];
        @endphp

        @foreach ($materi as $m)
          <span class="px-4 py-2 bg-[#7CB518] text-white rounded-full text-sm font-medium shadow">
            {{ $m }}
          </span>
        @endforeach
      </div>
    </div>

    <!-- Deskripsi -->
    <div>
      <h2 class="text-xl font-semibold mb-4 text-[#111]">
        Belajar memahami alam semesta melalui Ilmu Pengetahuan Alam
      </h2>
      <p class="text-gray-600 leading-relaxed text-justify">
        Jurusan Ilmu Pengetahuan Alam (IPA) membekali siswa dengan kemampuan berpikir logis, analitis, dan eksperimental.
        Melalui mata pelajaran seperti Fisika, Kimia, Biologi, dan Matematika, siswa diajak untuk meneliti fenomena alam serta mengembangkan solusi ilmiah bagi kehidupan manusia.
      </p>
      <p class="text-gray-600 leading-relaxed text-justify mt-3">
        Program ini sangat cocok bagi kamu yang memiliki rasa ingin tahu tinggi, gemar bereksperimen, dan bercita-cita menjadi ilmuwan, dokter, atau peneliti masa depan.
      </p>
    </div>
  </section>

  <!-- Prospek Karir -->
  <h2 class="text-lg md:text-xl font-semibold mt-6 text-center">Prospek Karir untuk Lulusan IPA:</h2>
  <div class="relative flex flex-wrap justify-center gap-6 mt-6">
    @php
      $career = [
        'Dokter',
        'Ahli Bioteknologi',
        'Peneliti',
        'Apoteker',
        'Insinyur',
        'Ahli Lingkungan',
        'Dosen Sains',
      ];
    @endphp

    @foreach ($career as $job)
      <span class="px-6 py-3 bg-[#7CB518] text-white text-sm md:text-base font-medium rounded-full shadow">
        {{ $job }}
      </span>
    @endforeach
  </div>

  <!-- Tombol Kembali -->
  <div class="text-center py-10">
    <a href="{{ url('/sma') }}" 
       class="inline-flex items-center px-6 py-3 border border-[#7CB518] text-[#7CB518] font-semibold rounded-full hover:bg-[#7CB518] hover:text-white transition-all duration-300">
      ← Kembali ke Beranda
    </a>
  </div>

</div>
@endsection
