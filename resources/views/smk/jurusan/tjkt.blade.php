@extends('smk.layouts.app')

@section('title', 'TJKT - SMK Citra Negara')

@section('content')
<div class="bg-[#f8f8f8] text-gray-800">
  
  <!-- Career Bubble Section -->
  <section class="relative pt-16 flex flex-col items-center">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <!-- Floating Label Badge -->
        <div class="mb-8 flex justify-center" data-aos="fade-down">
             <div class="bg-[#89B9E0]/10 text-[#5A9ACF] border border-[#89B9E0]/30 px-4 py-1.5 rounded-full text-[10px] font-black tracking-[0.2em] uppercase">
                Jurusan Unggulan
             </div>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-12">
            <!-- Icon/Logo Jurusan with Glow -->
            <div class="relative" data-aos="zoom-in" data-aos-delay="200">
                <div class="absolute inset-0 bg-[#89B9E0]/15 blur-3xl rounded-full"></div>
                <img src="{{ asset('/images/smk/jurusan/logo-tjkt.png') }}" class="relative w-24 h-24 md:w-32 md:h-32 object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-500">
            </div>
            
            <!-- Title with Modern Accent -->
            <div class="text-center md:text-left border-l-0 md:border-l-[6px] border-[#89B9E0] md:pl-10" data-aos="fade-left" data-aos-delay="300">
                <h1 class="text-3xl md:text-5xl font-black text-gray-900 tracking-tight leading-[1.1]">
                    Teknik Jaringan <br>
                    <span class="text-[#89B9E0]">Komputer & Telekomunikasi</span>
                </h1>
                <p class="mt-4 text-gray-500 font-medium text-sm md:text-lg max-w-md mx-auto md:mx-0">
                    Bangun konektivitas dunia dan jadilah ahli infrastruktur jaringan handal.
                </p>
            </div>
        </div>
    </div>

    <!-- Foto Model dengan Masking -->
    <div class="mt-12 flex justify-center w-full relative" data-aos="fade-up" data-aos-delay="400">
      <img src="/images/smk/jurusan/ml-tjkt.png" loading="lazy" decoding="async" alt="model pasangan tjkt" class="w-full max-w-sm [mask-image:linear-gradient(to_bottom,black_80%,transparent_100%)] [-webkit-mask-image:linear-gradient(to_bottom,black_80%,transparent_100%)]">
    </div>
  </section>

  <!-- Materi & Deskripsi Section -->
  <section class="max-w-7xl mx-auto px-6 py-20">
    <div class="grid lg:grid-cols-12 gap-12 items-start">
      
      <!-- Deskripsi Card -->
      <div class="lg:col-span-7 bg-white rounded-[2.5rem] p-8 md:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-gray-100" data-aos="fade-right">
          <div class="flex items-center gap-3 mb-6">
              <div class="w-12 h-1.5 bg-[#89B9E0] rounded-full"></div>
              <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#5A9ACF]">Infrastruktur Digital</span>
          </div>
          <h2 class="text-2xl md:text-4xl font-black mb-8 text-gray-900 leading-tight tracking-tight">
            Apa Itu Bidang Studi <br> Jaringan & Telekomunikasi?
          </h2>
          <div class="space-y-6">
              <p class="text-gray-600 leading-relaxed text-lg text-justify border-l-4 border-gray-100 pl-6">
                Bidang studi <span class="font-bold text-gray-900 underline decoration-[#89B9E0]/30">Teknik Jaringan Komputer dan Telekomunikasi (TJKT)</span> adalah program pendidikan yang fokus pada arsitektur jaringan masa depan. 
              </p>
              <p class="text-gray-600 leading-relaxed">
                Program ini dirancang untuk membekali siswa dengan keahlian teknis dalam membangun, mengelola, dan mengamankan infrastruktur TI serta sistem telekomunikasi yang menjadi tulang punggung dunia digital modern.
              </p>
          </div>
      </div>

      <!-- Materi Card -->
      <div class="lg:col-span-5" data-aos="fade-left">
          <h2 class="text-2xl font-bold mb-8 flex items-center gap-4 text-gray-800">
              <div class="w-10 h-10 rounded-full bg-[#89B9E0]/10 flex items-center justify-center">
                <i class="fa-solid fa-server text-sm text-[#5A9ACF]"></i>
              </div>
              Kurikulum Inti
          </h2>
          @php
            $materi = [
              'Administrasi Jaringan (LAN/WAN)',
              'Teknologi Jaringan Nirkabel',
              'Sistem Keamanan Jaringan',
              'Cloud Computing & Virtualization',
              'Sistem Telekomunikasi Modern',
              'Troubleshooting Jaringan Dasar',
            ];
          @endphp
          <div class="grid gap-4">
            @foreach ($materi as $m)
                <div class="group flex items-center p-5 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-[#89B9E0]/30 transition-all duration-300">
                    <div class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 group-hover:bg-[#89B9E0] group-hover:text-white transition-all duration-500">
                        <i class="fa-solid fa-microchip text-xs"></i>
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
    <div class="absolute top-0 right-0 w-96 h-96 bg-[#89B9E0]/5 blur-[100px] rounded-full"></div>
    <div class="max-w-6xl mx-auto px-6 relative z-10">
        <div class="text-center mb-20" data-aos="fade-up">
            <h2 class="text-3xl md:text-5xl font-black text-white mb-6">Masa Depan Ahli Jaringan</h2>
            <div class="w-20 h-1.5 bg-[#89B9E0] mx-auto rounded-full mb-6"></div>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">Kebutuhan akan ahli jaringan terus meningkat seiring dengan digitalisasi segala sektor industri di seluruh dunia.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
              $career = [
                'Network Administrator',
                'IT Support Specialist',
                'System Engineer',
                'Cloud Engineer',
                'Network Security Analyst',
                'Field Support Engineer',
              ];
            @endphp
            @foreach ($career as $job)
                <div class="bg-white/5 border border-white/10 p-8 rounded-[2rem] hover:bg-[#89B9E0] group transition-all duration-500 cursor-default" data-aos="zoom-in">
                    <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-[#89B9E0] group-hover:bg-black/10 group-hover:text-gray-900 mb-6 transition-all">
                        <i class="fa-solid fa-satellite-dish text-xl"></i>
                    </div>
                    <h3 class="text-white group-hover:text-gray-900 font-black text-xl tracking-tight leading-tight transition-colors">{{ $job }}</h3>
                    <p class="mt-3 text-gray-500 group-hover:text-gray-800 text-sm opacity-0 group-hover:opacity-100 transition-all">Menjaga dunia tetap terhubung melalui sistem yang cerdas.</p>
                </div>
            @endforeach
        </div>
    </div>
  </section>

  <!-- Jurusan Lainnya Section -->
  <section class="bg-gray-50 py-24 border-t border-gray-100">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-black text-gray-900 mb-2">Eksplorasi Jurusan</h2>
      <div class="w-12 h-1.5 bg-[#89B9E0] mx-auto rounded-full mb-4"></div>
      <p class="text-gray-500 mb-12">Pilih jalur masa depanmu di SMK Citra Negara.</p>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
        @php
          $jurusanLain = [
            ['nama'=>'DKV', 'icon'=>'fa-palette', 'color'=>'#DC1C3A'],
            ['nama'=>'PPLG', 'icon'=>'fa-code', 'color'=>'#000367'],
            ['nama'=>'PM', 'icon'=>'fa-bullhorn', 'color'=>'#E26A00'],
            ['nama'=>'MPLB', 'icon'=>'fa-briefcase', 'color'=>'#FFD600'],
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
