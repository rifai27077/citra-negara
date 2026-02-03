@extends('layouts.app')

@section('title', $prestasi->title . ' - Prestasi Citra Negara')

@section('content')
<section class="relative py-20 px-6 bg-white overflow-hidden">
  <!-- Background Elements -->
  <div class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-[#f7f7f7] to-white -z-10"></div>
  <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#699D15]/5 rounded-full blur-3xl -z-10"></div>

  <div class="max-w-4xl mx-auto relative z-10">
    
    <!-- Breadcrumbs -->
    <nav class="flex items-center text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
      <a href="/" class="hover:text-[#699D15] transition-colors">Beranda</a>
      <svg class="w-3 h-3 mx-2 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
      </svg>
      <a href="{{ route(strtolower($prestasi->category) . '.prestasi') }}" class="hover:text-[#699D15] transition-colors">Prestasi</a>
      <svg class="w-3 h-3 mx-2 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
      </svg>
      <span class="text-gray-900 font-medium truncate">{{ $prestasi->title }}</span>
    </nav>

    <!-- Header -->
    <header class="mb-10 text-center md:text-left">
        <span class="inline-block px-3 py-1 mb-4 text-xs font-semibold tracking-wider text-[#699D15] uppercase bg-[#f1f8e6] rounded-full">
            Prestasi {{ $prestasi->category }}
        </span>
        <h1 class="text-3xl md:text-5xl font-extrabold text-[#2F2F2F] mb-4 leading-tight">
            {{ $prestasi->title }}
        </h1>
        <p class="text-gray-500 font-medium">
            <i class="far fa-calendar-alt mr-2"></i> {{ $prestasi->date->format('d F Y') }}
        </p>
    </header>

    <!-- Featured Image -->
    <figure class="mb-12 rounded-3xl overflow-hidden shadow-xl aspect-[4/5] md:max-w-md mx-auto relative">
        <img src="{{ $prestasi->image ? asset('storage/' . $prestasi->image) : asset('/images/placeholder.jpg') }}" alt="{{ $prestasi->title }}" class="absolute inset-0 w-full h-full object-cover">
    </figure>

    <!-- Content -->
    <article class="prose prose-lg prose-slate prose-headings:text-[#2F2F2F] prose-a:text-[#699D15] hover:prose-a:text-[#527e0f] prose-img:rounded-xl max-w-none bg-white p-0 md:p-4 rounded-xl w-full break-words">
        {!! $prestasi->description !!}
    </article>

    <!-- Footer / Navigation -->
    <div class="mt-16 pt-10 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-6">
        <a href="{{ route(strtolower($prestasi->category) . '.prestasi') }}" class="group flex items-center text-gray-600 hover:text-[#699D15] transition-colors font-medium">
            <span class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-[#f1f8e6] transition-colors">
                <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </span>
            Kembali ke Daftar Prestasi
        </a>
    </div>
  </div>
</section>
@endsection
