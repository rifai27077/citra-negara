
@extends('layouts.app')

@section('title', 'SMA Citra Negara')

@section('content')
  @include('sma.components.hero')
  @include('sma.components.sambutan')
  @include('sma.components.visi-misi')
  @include('sma.components.jurusan')
  @include('sma.components.prestasi')
  @include('sma.components.ekstrakurikuler')
  @include('sma.components.kontak-info')
@endsection
