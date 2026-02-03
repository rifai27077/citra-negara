@extends('layouts.app')

@section('title', 'SMK Citra Negara - Sekolah Kejuruan Unggulan di Depok')
@section('meta_description', 'SMK Citra Negara menawarkan 6 jurusan unggulan: TJKT, PPLG, DKV, Perhotelan, MPLB, dan Pemasaran. Sekolah kejuruan terbaik di Depok dengan fasilitas lengkap dan tenaga pengajar profesional.')
@section('meta_keywords', 'SMK Citra Negara, SMK di Depok, TJKT, PPLG, DKV, Perhotelan, MPLB, Pemasaran, Sekolah Kejuruan Depok, SMK Terbaik Depok, PPDB SMK Depok')

@section('content')
  @include('smk.components.hero')
  @include('smk.components.sambutan')
  @include('smk.components.visi-misi')
  @include('smk.components.bidang-studi')
  @include('smk.components.jurusan')
  @include('smk.components.daftarharga')
  @include('smk.components.prestasi')
  @include('smk.components.ekstrakurikuler')
  @include('smk.components.kontak-info')
@endsection
