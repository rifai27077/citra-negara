@extends('layouts.app')

@section('content')
<section class="py-16 bg-white mt-10">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-extrabold text-black">Kalender Akademik</h2>
        <p class="text-gray-600 font-medium mt-1 mb-6">SMK Citra Negara</p>

        {{-- Tabs --}}
        <div class="flex gap-4 mb-8">
            <button class="px-6 py-2 border-2 border-[#7CB518] rounded-full font-semibold text-[#7CB518] hover:bg-[#7CB518] hover:text-white transition">SMP</button>
            <button class="px-6 py-2 border-2 border-[#7CB518] rounded-full font-semibold text-[#7CB518] hover:bg-[#7CB518] hover:text-white transition">SMA</button>
            <button class="px-6 py-2 border-2 border-[#7CB518] rounded-full font-semibold text-[#7CB518] hover:bg-[#7CB518] hover:text-white transition">SMK</button>
        </div>

        {{-- Events List --}}
        <div class="space-y-6">
            <!-- Event 1 -->
            <div class="flex items-center justify-between bg-[#7CB518] text-white rounded-full px-6 py-4 shadow">
                <span class="font-semibold">1. MPLS Tahun Ajaran 2026/2027</span>
                <span class="bg-[#A6D94F] text-black font-semibold px-4 py-2 rounded-full">1 - 3 Juni 2026</span>
            </div>

            <!-- Event 2 -->
            <div class="flex items-center justify-between bg-[#7CB518] text-white rounded-full px-6 py-4 shadow">
                <span class="font-semibold">2. LDKS (Latihan Dasar Kepemimpinan Siswa)</span>
                <span class="bg-[#A6D94F] text-black font-semibold px-4 py-2 rounded-full">10 Juli 2026</span>
            </div>

            <!-- Event 3 -->
            <div class="flex items-center justify-between bg-[#7CB518] text-white rounded-full px-6 py-4 shadow">
                <span class="font-semibold">3. HUT RI KE-81</span>
                <span class="bg-[#A6D94F] text-black font-semibold px-4 py-2 rounded-full">17 Agustus 2026</span>
            </div>
        </div>
    </div>
</section>
@endsection
