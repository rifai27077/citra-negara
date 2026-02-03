@extends('layouts.app')

@section('title', 'Citra Negara - Sekolah Unggulan SMK, SMA, SMP di Depok')
@section('meta_description', 'Yayasan At-Taqwa Kemiri Jaya - Citra Negara menaungi SMK, SMA, dan SMP unggulan di Depok. Membentuk generasi terampil, disiplin, dan siap kerja dengan visi MANTAP (Mutu, Amanah, Nyaman, Taqwa, Aktif, Profesional).')
@section('meta_keywords', 'Citra Negara, Yayasan At-Taqwa, Sekolah di Depok, SMK Depok, SMA Depok, SMP Depok, Pendidikan Depok, Sekolah Unggulan Depok')

@section('content')
    <x-hero-section />
    <x-sejarah />
    <x-founder />
    <x-visi-misi />
    <x-unit />
    <x-informasi/>
    <x-cta />
@endsection