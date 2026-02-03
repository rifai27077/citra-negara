@extends('layouts.app')

@section('title', 'Ekstrakurikuler SMP Citra Negara')
@section('meta_description', 'Daftar ekstrakurikuler di SMP Citra Negara. Wadah pengembangan bakat dan karakter siswa.')

@section('content')
<section id="all-ekskul" class="relative py-24 px-6 bg-[#f7f7f7] overflow-hidden">
  <div class="absolute inset-0 opacity-20 bg-[url('/images/pattern-light.svg')] bg-repeat"></div>
  <div class="absolute top-0 left-0 w-80 h-80 bg-[#699D15]/10 rounded-full blur-3xl"></div>
  <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#699D15]/5 rounded-full blur-3xl"></div>

  <div class="max-w-7xl mx-auto relative z-10">
    @php
        $ekskul = \App\Models\Ekstrakurikuler::where('category', 'SMP')->paginate(9);
    @endphp

    <!-- Breadcrumbs -->
    <nav class="flex items-center text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
      <a href="/" class="hover:text-[#699D15] transition-colors">Beranda</a>
      <svg class="w-3 h-3 mx-2 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
      </svg>
      <span class="text-gray-900 font-medium">Ekstrakurikuler</span>
    </nav>

    <!-- Judul Halaman -->
    <div class="text-center mb-14">
      <h1 class="text-3xl md:text-5xl font-extrabold text-[#2F2F2F] leading-tight">
        Ekstrakurikuler <span class="text-[#699D15]">SMP</span> Citra Negara
      </h1>
      <p class="text-gray-600 text-base md:text-lg mt-5 max-w-3xl mx-auto leading-relaxed">
        Wadah pengembangan diri, bakat, dan karakter siswa melalui berbagai kegiatan positif di lingkungan SMP Citra Negara.
      </p>
      <div class="w-24 h-1 bg-[#699D15] mx-auto mt-6 rounded-full"></div>
    </div>

    <!-- Daftar Ekskul -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10" data-aos="fade-up">
      @forelse ($ekskul as $item)
        <div class="group relative rounded-2xl overflow-hidden bg-white shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 flex flex-col h-full">
          {{-- Image Container --}}
          <div class="relative h-64 overflow-hidden">
            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('/images/placeholder.jpg') }}" 
                 alt="{{ $item->name }}" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
          </div>
          
          {{-- Content --}}
          <div class="p-8 flex flex-col flex-grow">
            <div class="mb-4">
                <span class="inline-block px-3 py-1 text-xs font-semibold text-[#699D15] bg-[#f1f8e6] rounded-full uppercase">
                    SMP
                </span>
            </div>
            <h4 class="font-bold text-2xl text-[#2F2F2F] mb-4 group-hover:text-[#699D15] transition-colors line-clamp-2">
                {{ $item->name }}
            </h4>
            <div class="text-gray-600 mb-6 line-clamp-3 text-sm flex-grow">
                {!! strip_tags($item->description) !!}
            </div>
            <a href="{{ route('smp.ekstrakurikuler.show', $item->slug) }}" 
               class="inline-flex items-center justify-center bg-[#699D15] hover:bg-[#7CB518] text-white px-6 py-3 rounded-full text-sm font-bold shadow-lg transition-all duration-300 transform group-hover:translate-x-2">
              Lihat Detail
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
          </div>
        </div>
      @empty
        <div class="col-span-3 text-center py-20 bg-white rounded-3xl border border-dashed border-gray-300">
            <p class="text-gray-400 text-lg">Belum ada data ekstrakurikuler SMP.</p>
        </div>
      @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-12 flex justify-center">
        {{ $ekskul->links() }}
    </div>

    <!-- Tombol Kembali -->
    <div class="text-center mt-16">
      <a href="{{ route('smp.index') }}" class="inline-flex items-center text-gray-600 hover:text-[#699D15] font-semibold transition-colors">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Kembali ke Beranda SMP
      </a>
    </div>

  </div>
</section>
@endsection
