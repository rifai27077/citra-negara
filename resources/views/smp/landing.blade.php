
@extends('layouts.app')

@section('title', 'SMP Citra Negara')

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
