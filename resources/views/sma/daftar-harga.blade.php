@extends ('layouts.app')
@section('title', 'Daftar Harga Biaya Pendidikan SMK Citra Negara')
@section('content')

<section class="py-20 px-6 bg-white" data-aos="fade-up" data-aos-duration="1000">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl text-[#7CB518] md:text-4xl font-extrabold text-center mb-10">
      Tabel Biaya Pendidikan 
      <p class="text-black">SMP, SMA & SMK Citra Negara Tahun Ajaran 2026/2027</p>
    </h2>

    <!-- Tombol Daftar SPMB (mobile only) -->
    <div class="flex justify-center mt-8 mb-8 md:hidden">
      <a href="/spmb" 
         class="inline-block bg-white border-2 border-[#7CB518] text-[#7CB518] font-semibold px-8 py-3 rounded-full shadow-sm transition-all duration-300 hover:bg-[#7CB518] hover:text-white active:scale-95">
        Daftar SPMB Sekarang
      </a>
    </div>

    <!-- ==================== SMP ==================== -->
    <h1 class="text-2xl font-bold text-[#7CB518] mt-12 mb-4 text-center">SMP Citra Negara</h1>
    <div class="overflow-x-auto rounded-2xl shadow-lg border border-[#7CB518]/20 mb-10">
      <table class="w-full text-sm text-left text-gray-700">
        <thead class="bg-[#7CB518]/10 text-[#7CB518] uppercase font-semibold">
          <tr>
            <th class="px-6 py-3">Jurusan / Program</th>
            <th class="px-6 py-3 text-right">Pendaftaran</th>
            <th class="px-6 py-3 text-right">Daftar Ulang</th>
            <th class="px-6 py-3 text-right">Total</th>
            <th class="px-6 py-3 text-right">SPP</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <tr>
            <td class="px-6 py-4">Program Reguler (SMP)</td>
            <td class="px-6 py-4 text-right">800.000</td>
            <td class="px-6 py-4 text-right">1.500.000</td>
            <td class="px-6 py-4 text-right">2.300.000</td>
            <td class="px-6 py-4 text-right">800.000</td>
          </tr>
          <tr>
            <td class="px-6 py-4">Program Unggulan (SMP Plus)</td>
            <td class="px-6 py-4 text-right">1.100.000</td>
            <td class="px-6 py-4 text-right">1.900.000</td>
            <td class="px-6 py-4 text-right">3.000.000</td>
            <td class="px-6 py-4 text-right">1.100.000</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- ==================== SMA ==================== -->
    <h1 class="text-2xl font-bold text-[#7CB518] mt-12 mb-4 text-center">SMA Citra Negara</h1>
    <div class="overflow-x-auto rounded-2xl shadow-lg border border-[#7CB518]/20 mb-10">
      <table class="w-full text-sm text-left text-gray-700">
        <thead class="bg-[#7CB518]/10 text-[#7CB518] uppercase font-semibold">
          <tr>
            <th class="px-6 py-3">Jurusan / Program</th>
            <th class="px-6 py-3 text-right">Pendaftaran</th>
            <th class="px-6 py-3 text-right">Daftar Ulang</th>
            <th class="px-6 py-3 text-right">Total</th>
            <th class="px-6 py-3 text-right">SPP</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <tr>
          <td class="px-6 py-4">SMA Reguler</td>
          <td class="px-6 py-4 text-right">2.000.000</td>
          <td class="px-6 py-4 text-right">3.000.000</td>
          <td class="px-6 py-4 text-right">5.000.000</td>
          <td class="px-6 py-4 text-right">2.000.000</td>
          </tr>
          <tr>
            <td class="px-6 py-4">SMA Plus</td>
            <td class="px-6 py-4 text-right">2.500.000</td>
            <td class="px-6 py-4 text-right">3.800.000</td>
            <td class="px-6 py-4 text-right">6.300.000</td>
            <td class="px-6 py-4 text-right">2.500.000</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- ==================== SMK ==================== -->
    <h1 class="text-2xl font-bold text-[#7CB518] mt-12 mb-4 text-center">SMK Citra Negara</h1>
    <div class="overflow-x-auto rounded-2xl shadow-lg border border-[#7CB518]/20">
      <table class="w-full text-sm text-left text-gray-700">
        <thead class="bg-[#7CB518]/10 text-[#7CB518] uppercase font-semibold">
          <tr>
            <th class="px-6 py-3">Jurusan</th>
            <th class="px-6 py-3 text-right">Pendaftaran</th>
            <th class="px-6 py-3 text-right">Daftar Ulang</th>
            <th class="px-6 py-3 text-right">Total</th>
            <th class="px-6 py-3 text-right">SPP</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
         <tr>
            <td class="px-6 py-4">Desain Komunikasi Visual (DKV)</td>
            <td class="px-6 py-4 text-right">1.500.000</td>
            <td class="px-6 py-4 text-right">3.000.000</td>
            <td class="px-6 py-4 text-right">4.500.000</td>
            <td class="px-6 py-4 text-right">1.500.000</td>
          </tr>

          <tr>
            <td class="px-6 py-4">Desain Komunikasi Visual (DKV) Plus</td>
            <td class="px-6 py-4 text-right">2.000.000</td>
            <td class="px-6 py-4 text-right">4.000.000</td>
            <td class="px-6 py-4 text-right">6.000.000</td>
            <td class="px-6 py-4 text-right">2.000.000</td>
          </tr>

          <tr>
            <td class="px-6 py-4">Manajemen Perkantoran & Layanan Bisnis (MPLB)</td>
            <td class="px-6 py-4 text-right">1.000.000</td>
            <td class="px-6 py-4 text-right">2.500.000</td>
            <td class="px-6 py-4 text-right">3.500.000</td>
            <td class="px-6 py-4 text-right">1.000.000</td>
          </tr>

          <tr>
            <td class="px-6 py-4">Manajemen Perkantoran & Layanan Bisnis (MPLB) Plus</td>
            <td class="px-6 py-4 text-right">1.500.000</td>
            <td class="px-6 py-4 text-right">3.500.000</td>
            <td class="px-6 py-4 text-right">5.000.000</td>
            <td class="px-6 py-4 text-right">1.500.000</td>
          </tr>

          <tr>
            <td class="px-6 py-4">Teknik Jaringan Komputer & Telekomunikasi (TJKT)</td>
            <td class="px-6 py-4 text-right">1.200.000</td>
            <td class="px-6 py-4 text-right">2.800.000</td>
            <td class="px-6 py-4 text-right">4.000.000</td>
            <td class="px-6 py-4 text-right">1.200.000</td>
          </tr>

          <tr>
            <td class="px-6 py-4">Teknik Jaringan Komputer & Telekomunikasi (TJKT) Plus</td>
            <td class="px-6 py-4 text-right">1.800.000</td>
            <td class="px-6 py-4 text-right">3.800.000</td>
            <td class="px-6 py-4 text-right">5.600.000</td>
            <td class="px-6 py-4 text-right">1.800.000</td>
          </tr>

          <tr>
            <td class="px-6 py-4">Pengembangan Perangkat Lunak dan Game (PPLG)</td>
            <td class="px-6 py-4 text-right">1.300.000</td>
            <td class="px-6 py-4 text-right">2.700.000</td>
            <td class="px-6 py-4 text-right">4.000.000</td>
            <td class="px-6 py-4 text-right">1.300.000</td>
          </tr>

          <tr>
            <td class="px-6 py-4">Pengembangan Perangkat Lunak dan Game (PPLG) Plus</td>
            <td class="px-6 py-4 text-right">1.800.000</td>
            <td class="px-6 py-4 text-right">3.800.000</td>
            <td class="px-6 py-4 text-right">5.600.000</td>
            <td class="px-6 py-4 text-right">1.800.000</td>
          </tr>

          <tr>
            <td class="px-6 py-4">Pemasaran</td>
            <td class="px-6 py-4 text-right">1.000.000</td>
            <td class="px-6 py-4 text-right">2.500.000</td>
            <td class="px-6 py-4 text-right">3.500.000</td>
            <td class="px-6 py-4 text-right">1.000.000</td>
          </tr>
          <tr>
            <td class="px-6 py-4">Perhotelan</td>
            <td class="px-6 py-4 text-right">Coming soon</td>
            <td class="px-6 py-4 text-right">Coming soon</td>
            <td class="px-6 py-4 text-right">Coming soon</td>
            <td class="px-6 py-4 text-right">Coming soon</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Tombol Kembali -->
    <div class="flex justify-center mt-10">
      <a href="/" 
         class="inline-block bg-[#7CB518] text-white font-semibold px-8 py-3 rounded-full shadow-md transition-all duration-300 hover:bg-[#6aa212] hover:shadow-[0_0_20px_rgba(124,181,24,0.5)] active:scale-95">
        Kembali ke Beranda
      </a>
    </div>
  </div>
</section>

@endsection
