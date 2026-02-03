@extends('layouts.app')

@section('title', 'SMA Citra Negara - Sekolah Menengah Atas Unggulan di Depok')
@section('meta_description', 'SMA Citra Negara menyediakan jurusan IPA dan IPS dengan kurikulum berkualitas, fasilitas modern, dan tenaga pengajar berpengalaman. Sekolah menengah atas terbaik di Depok untuk masa depan gemilang.')
@section('meta_keywords', 'SMA Citra Negara, SMA di Depok, SMA IPA Depok, SMA IPS Depok, Sekolah Menengah Atas Depok, PPDB SMA Depok, SMA Terbaik Depok')

@section('content')
  @include('sma.components.hero')
  @include('sma.components.sambutan')
  @include('sma.components.visi-misi')
  @include('sma.components.jurusan')
  @include('sma.components.prestasi')
  @include('sma.components.ekstrakurikuler')
  @include('sma.components.kontak-info')
@endsection
