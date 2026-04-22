@extends('smk.layouts.app')

@section('title', 'TJKT - SMK Citra Negara')

@section('content')
<div class="bg-[#f8f8f8] text-gray-800">

  <!-- Career Bubble Section -->
  <section class="relative pt-16 flex flex-col items-center">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <!-- Floating Label Badge -->
        <div class="mb-8 flex justify-center" data-aos="fade-down">
             <div class="bg-[#FFD600]/10 text-[#9C8400] border border-[#FFD600]/30 px-4 py-1.5 rounded-full text-[10px] font-black tracking-[0.2em] uppercase">
                Jurusan Unggulan
             </div>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-12">
            <!-- Icon/Logo Jurusan with Glow -->
            <div class="relative" data-aos="zoom-in" data-aos-delay="200">
                <div class="absolute inset-0 bg-[#FFD600]/15 blur-3xl rounded-full"></div>
                <img src="{{ asset('/images/smk/jurusan/logo-mplb.png') }}" class="relative w-24 h-24 md:w-32 md:h-32 object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-500">
            </div>
            
            <!-- Title with Modern Accent -->
            <div class="text-center md:text-left border-l-0 md:border-l-[6px] border-[#FFD600] md:pl-10" data-aos="fade-left" data-aos-delay="300">
                <h1 class="text-3xl md:text-5xl font-black text-gray-900 tracking-tight leading-[1.1]">
                    Manajemen <span class="text-[#FFD600]">Perkantoran</span> <br>
                    <span class="text-gray-400 font-light">&</span> Layanan Bisnis
                </h1>
                <p class="mt-4 text-gray-500 font-medium text-sm md:text-lg max-w-md mx-auto md:mx-0">
                    Mencetak tenaga administrasi profesional yang siap kerja di era digital.
                </p>
            </div>
        </div>
    </div>

    <!-- Foto Model dengan Masking -->
    <div class="mt-12 flex justify-center w-full relative" data-aos="fade-up" data-aos-delay="400">
      <img src="/images/smk/jurusan/ml-mplb.png" loading="lazy" decoding="async" alt="model pasangan mplb" class="w-full max-w-sm [mask-image:linear-gradient(to_bottom,black_80%,transparent_100%)] [-webkit-mask-image:linear-gradient(to_bottom,black_80%,transparent_100%)]">
    </div>
  </section>

  <!-- Materi & Deskripsi Section -->
  <section class="max-w-7xl mx-auto px-6 py-20">
    <div class="grid lg:grid-cols-12 gap-12 items-start">
      
      <!-- Deskripsi Card -->
      <div class="lg:col-span-7 bg-white rounded-[2.5rem] p-8 md:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-gray-100" data-aos="fade-right">
          <div class="flex items-center gap-3 mb-6">
              <div class="w-12 h-1.5 bg-[#FFD600] rounded-full"></div>
              <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#9C8400]">Tentang Jurusan</span>
          </div>
          <h2 class="text-2xl md:text-4xl font-black mb-8 text-gray-900 leading-tight tracking-tight">
            Apa Itu Bidang Studi <br> Manajemen Perkantoran?
          </h2>
          <div class="space-y-6">
              <p class="text-gray-600 leading-relaxed text-lg text-justify">
                Bidang studi <span class="font-bold text-gray-900">Manajemen Perkantoran dan Layanan Bisnis</span> adalah program pendidikan yang dirancang untuk mempersiapkan siswa dengan pengetahuan dan keterampilan praktis dalam mengelola administrasi perkantoran dan memberikan layanan bisnis yang efektif. 
              </p>
              <div class="p-6 bg-gray-50 rounded-2xl border-l-4 border-[#FFD600] italic text-gray-500">
                Pendidikan ini mencakup manajemen waktu, komunikasi bisnis profesional, hingga pengarsipan digital yang esensial di perusahaan modern.
              </div>
          </div>
      </div>

      <!-- Materi Card -->
      <div class="lg:col-span-5" data-aos="fade-left">
          <h2 class="text-2xl font-bold mb-8 flex items-center gap-4 text-gray-800">
              <div class="w-10 h-10 rounded-full bg-[#FFD600]/10 flex items-center justify-center">
                <i class="fa-solid fa-book-open text-sm text-[#9C8400]"></i>
              </div>
              Kurikulum Utama
          </h2>
          @php
            $materi = [
              'Komunikasi Bisnis',
              'Teknologi Perkantoran',
              'Manajemen Waktu & Produktivitas',
              'Administrasi Perkantoran',
              'Dasar Manajemen Bisnis',
              'Keuangan & Akuntansi Dasar',
            ];
          @endphp
          <div class="grid gap-4">
            @foreach ($materi as $m)
                <div class="group flex items-center p-5 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-[#FFD600]/30 transition-all duration-300">
                    <div class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 group-hover:bg-[#FFD600] group-hover:text-white transition-all duration-500">
                        <i class="fa-solid fa-check text-xs"></i>
                    </div>
                    <span class="ml-4 font-bold text-gray-700 tracking-tight group-hover:text-gray-900">{{ $m }}</span>
                </div>
            @endforeach
          </div>
      </div>
    </div>
  </section>

  <!-- Prospek Karir - Premium Dark Section -->
  <section class="bg-gray-900 py-24 rounded-t-[3rem] md:rounded-t-[5rem] overflow-hidden relative">
    <div class="absolute top-0 right-0 w-96 h-96 bg-[#FFD600]/5 blur-[100px] rounded-full"></div>
    <div class="max-w-6xl mx-auto px-6 relative z-10">
        <div class="text-center mb-20" data-aos="fade-up">
            <h2 class="text-3xl md:text-5xl font-black text-white mb-6">Peluang Karir Masa Depan</h2>
            <div class="w-20 h-1.5 bg-[#FFD600] mx-auto rounded-full mb-6"></div>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">Lulusan MPLB memiliki kompetensi yang sangat dibutuhkan oleh berbagai sektor industri dan perkantoran global.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
              $career = [
                'Asisten Manajer',
                'Staff Administrasi',
                'Customer Service',
                'Sekretaris Profesional',
                'Digital Filing Staff',
                'Resepsionis Hotel/Kantor',
              ];
            @endphp
            @foreach ($career as $job)
                <div class="bg-white/5 border border-white/10 p-8 rounded-[2rem] hover:bg-[#FFD600] group transition-all duration-500 cursor-default" data-aos="zoom-in">
                    <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-[#FFD600] group-hover:bg-black/10 group-hover:text-gray-900 mb-6 transition-all">
                        <i class="fa-solid fa-briefcase text-xl"></i>
                    </div>
                    <h3 class="text-white group-hover:text-gray-900 font-black text-xl tracking-tight leading-tight">{{ $job }}</h3>
                    <p class="mt-3 text-gray-500 group-hover:text-gray-800 text-sm opacity-0 group-hover:opacity-100 transition-opacity">Siap bekerja di kancah nasional maupun internasional.</p>
                </div>
            @endforeach
        </div>
    </div>
  </section>

  <!-- Jurusan Lainnya Section -->
  <section class="bg-gray-50 py-24 border-t border-gray-100">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-black text-gray-900 mb-2">Eksplorasi Jurusan</h2>
      <div class="w-12 h-1.5 bg-[#FFD600] mx-auto rounded-full mb-4"></div>
      <p class="text-gray-500 mb-12">Pilih jalur masa depanmu di SMK Citra Negara.</p>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
        @php
          $jurusanLain = [
            ['nama'=>'DKV', 'icon'=>'fa-palette', 'color'=>'#DC1C3A'],
            ['nama'=>'PPLG', 'icon'=>'fa-code', 'color'=>'#000367'],
            ['nama'=>'TJKT', 'icon'=>'fa-server', 'color'=>'#89B9E0'],
            ['nama'=>'PM', 'icon'=>'fa-bullhorn', 'color'=>'#E26A00'],
          ];
        @endphp

        @foreach ($jurusanLain as $j)
            <a href="{{ url('/smk/jurusan/' . strtolower($j['nama'])) }}"
               onmouseenter="this.querySelector('.icon-box').style.backgroundColor='{{ $j['color'] }}'"
               onmouseleave="this.querySelector('.icon-box').style.backgroundColor=''"
               class="group relative p-8 bg-white rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 flex flex-col items-center">
               
               <div class="icon-box w-14 h-14 rounded-2xl bg-gray-50 flex items-center justify-center text-gray-400 group-hover:text-white transition-all duration-500 mb-4 shadow-inner">
                  <i class="fa-solid {{ $j['icon'] }} text-xl"></i>
               </div>
               <h3 class="font-black text-gray-900 group-hover:text-gray-900 transition-colors uppercase tracking-widest text-sm">{{ $j['nama'] }}</h3>
               <div class="mt-4 w-6 h-1 transition-all duration-500 rounded-full" style="background-color: {{ $j['color'] }}"></div>
            </a>
        @endforeach
      </div>

      <!-- Tombol Kembali Modern -->
      <div class="mt-20">
        <a href="{{ url('/smk') }}" 
           class="group inline-flex items-center gap-4 px-10 py-5 bg-gray-900 text-white font-black rounded-full hover:bg-gray-800 transition-all duration-500 shadow-[0_20px_50px_rgba(0,0,0,0.2)] hover:shadow-gray-400/50">
          <i class="fa-solid fa-house text-sm text-[#FFD600] group-hover:rotate-12 transition-transform"></i>
          KEMBALI KE BERANDA SMK
        </a>
      </div>
    </div>
  </section>

</div>
@endsection
