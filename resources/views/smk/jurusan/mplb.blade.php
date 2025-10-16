@extends('smk.layouts.app')

@section('title', 'MPLB - SMK Citra Negara')

@section('content')
<div class="bg-[#f8f8f8] text-gray-800">

  <!-- Career Bubble Section -->
  <section class="relative flex flex-col items-center overflow-hidden">
     <div class="text-center">
      <div class="flex flex-col md:flex-row items-center justify-start md:p-2 gap-3">
        <img src="{{ asset('/images/smk/jurusan/logo-mplb.png') }}" loading="lazy" decoding="async" alt="Logo MPLB" class="w-20 md:w-20 md:h-20 object-contain">
        <h1 class="text-lg text-[#FFD600] md:text-xl font-extrabold">
            Manajemen Perkantoran dan Layanan Bisnis (MPLB)
        </h1>
      </div>
    </div>

    <div class="mt-4 items-center">
      <img src="/images/smk/jurusan/ml-mplb.png" loading="lazy" decoding="async" alt="model pasangan tjkt" class="w-full max-w-sm">
    </div>
  </section>

  <!-- Materi & Deskripsi -->
  <section class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 px-6 py-14">
    <!-- Materi -->
    <div>
      <h2 class="text-xl font-semibold mb-5">Materi yang akan dipelajari</h2>
      <div class="flex flex-wrap gap-3">
        @php
          $materi = [
            'Komunikasi Bisnis',
            'Teknologi Perkantoran',
            'Manajemen Waktu dan Produktivitas',
            'Administrasi Perkantoran',
            'Dasar-dasar Manajemen Perkantoran',
            'Keuangan dan Akuntansi Dasar',
          ];
        @endphp

        @foreach ($materi as $m)
          <span class="px-4 py-2 bg-[#FFD600] rounded-full text-sm font-medium shadow">
            {{ $m }}
          </span>
        @endforeach
      </div>
    </div>

    <!-- Deskripsi -->
    <div>
      <h2 class="text-xl font-semibold mb-4 text-[#111]">
       Apa Itu Bidang Studi Manajemen Perkantoran dan Layanan Bisnis?
      </h2>
      <p class="text-gray-600 leading-relaxed text-justify">
       Bidang studi Manajemen Perkantoran dan Layanan Bisnis adalah program pendidikan yang dirancang untuk mempersiapkan siswa dengan pengetahuan dan keterampilan praktis dalam mengelola administrasi perkantoran dan memberikan layanan bisnis yang efektif.
      </p>
    </div>
  </section>

   <h2 class="text-lg md:text-xl font-semibold mt-6 text-center">Prospek karir:</h2>
    <div class="relative flex flex-wrap justify-center gap-6 mt-6">
      @php
        $career = [
          'Asisten Manajer',
          'Staff Administrasi',
          'Staff Layanan Pelanggan',
          'Sekretaris',
          'Staf Pengarsipan',
          'Resepsionis',
        ];
      @endphp

      @foreach ($career as $job)
        <span class="px-6 py-3 bg-[#FFD600] text-sm md:text-base font-medium rounded-full shadow">
          {{ $job }}
        </span>
      @endforeach
    </div>

  <!-- Jurusan Lainnya Section -->
  <section class="bg-white py-16 mt-10">
    <div class="max-w-6xl mx-auto text-center px-6">
      <h2 class="text-2xl font-bold text-[#111] mb-8">Lihat Jurusan Lainnya</h2>

      @php
        $jurusanLain = [
          ['nama'=>'DKV','warna'=>'from-[#900B09] to-pink-300','border'=>'border-[#FF6B6B]','hover'=>'hover:bg-[#FF6B6B] hover:text-white'],

          ['nama'=>'PPLG','warna'=>'from-purple-400 to-purple-100','border'=>'border-[#B9B4F9]','hover'=>'hover:bg-[#B9B4F9] hover:text-white'],

          ['nama'=>'TJKT','warna'=>'from-[#89B9E0] to-blue-100','border'=>'border-[#89B9E0]','hover'=>'hover:bg-[#89B9E0] hover:text-white'],

          ['nama'=>'PM','warna'=>'from-[#FFB84C] to-[#FFD580]','border'=>'border-[#E26A00]','hover'=>'hover:bg-[#E26A00] hover:text-white'],
        ];
      @endphp

      <div class="flex flex-wrap justify-center gap-4">
        @foreach ($jurusanLain as $j)
          <a href="{{ url('/smk/jurusan/' . strtolower($j['nama'])) }}"
             class="inline-flex items-center px-5 py-2 bg-white {{ $j['border'] }} border rounded-full font-semibold text-sm transition-all duration-300 {{ $j['hover'] }}">
             {{ $j['nama'] }} <span class="ml-2">→</span>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Tombol Kembali -->
  <div class="text-center py-10">
    <a href="{{ url('/smk') }}" 
       class="inline-flex items-center px-6 py-3 border border-[#7CB518] text-[#7CB518] font-semibold rounded-full hover:bg-[#7CB518] hover:text-white transition-all duration-300">
      ← Kembali ke Beranda
    </a>
  </div>

</div>
@endsection
