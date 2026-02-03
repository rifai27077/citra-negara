@extends('layouts.app')

@section('title', 'SMP Citra Negara - Sekolah Menengah Pertama Unggulan di Depok')
@section('meta_description', 'SMP Citra Negara dengan program unggulan Web Programming, Tahfidz (Holaqoh Quran), Entrepreneurship, dan Conversation. Sekolah menengah pertama terbaik di Depok untuk pendidikan karakter dan prestasi.')
@section('meta_keywords', 'SMP Citra Negara, SMP di Depok, SMP Tahfidz Depok, SMP IT Depok, Sekolah Menengah Pertama Depok, PPDB SMP Depok, SMP Terbaik Depok')

@section('content')
  @include('smp.components.hero')
  @include('smp.components.sambutan')
  @include('smp.components.visi-misi')
  @include('smp.components.program-kelas')
  @include('smp.components.program-kegiatan')
  @include('smp.components.program-unggulan')
  @include('smp.components.cta-daftarHarga')
  @include('smp.components.prestasi')
  @include('smp.components.ekstrakurikuler')
  @include('smp.components.kontak')
@endsection
