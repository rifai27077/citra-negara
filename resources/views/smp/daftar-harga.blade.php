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

    <!-- Dynamic SMP Section -->
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
          @forelse($prices as $item)
          <tr class="hover:bg-gray-50 transition-colors">
            <td class="px-6 py-4">
              <span class="font-semibold block">{{ $item->title }}</span>
              @if($item->description)
                <span class="text-xs text-gray-400">{{ $item->description }}</span>
              @endif
            </td>
            <td class="px-6 py-4 text-right">
              {{ $item->pendaftaran && $item->pendaftaran > 0 ? 'Rp ' . number_format($item->pendaftaran, 0, ',', '.') : 'Coming Soon' }}
            </td>
            <td class="px-6 py-4 text-right">
              {{ $item->daftar_ulang && $item->daftar_ulang > 0 ? 'Rp ' . number_format($item->daftar_ulang, 0, ',', '.') : 'Coming Soon' }}
            </td>
            <td class="px-6 py-4 text-right">
              <span class="font-bold text-[#699D15]">
                {{ $item->total && $item->total > 0 ? 'Rp ' . number_format($item->total, 0, ',', '.') : 'Coming Soon' }}
              </span>
            </td>
            <td class="px-6 py-4 text-right">
              {{ $item->spp && $item->spp > 0 ? 'Rp ' . number_format($item->spp, 0, ',', '.') : 'Coming Soon' }}
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="px-6 py-10 text-center text-gray-500 italic">Data belum tersedia</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <!-- Tombol Kembali -->
    <div class="flex justify-center mt-10">
      <a href="/smp" 
         class="inline-block bg-[#7CB518] text-white font-semibold px-8 py-3 rounded-full shadow-md transition-all duration-300 hover:bg-[#6aa212] hover:shadow-[0_0_20px_rgba(124,181,24,0.5)] active:scale-95">
        Kembali ke Beranda
      </a>
    </div>
  </div>
</section>

@endsection
