@extends('layouts.admin')

@section('title', 'Detail Pendaftaran')
@section('header', 'Detail Pendaftaran')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Back Button -->
    <a href="{{ route('admin.ppdb.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-primary-600 transition-colors">
        <i class="fas fa-arrow-left"></i>
        <span>Kembali ke Daftar</span>
    </a>
    
    <!-- Main Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Header -->
        <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
            <div class="flex items-start justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-full {{ $ppdb->jenis_kelamin === 'L' ? 'bg-blue-100' : 'bg-pink-100' }} flex items-center justify-center">
                        <i class="fas fa-{{ $ppdb->jenis_kelamin === 'L' ? 'male text-blue-600' : 'female text-pink-600' }} text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">{{ $ppdb->nama_lengkap }}</h2>
                        <p class="text-gray-500">NISN: {{ $ppdb->nisn }}</p>
                        <div class="flex items-center gap-2 mt-2">
                            @php
                                $jenjangColors = [
                                    'smk' => 'bg-primary-100 text-primary-700',
                                    'sma' => 'bg-blue-100 text-blue-700',
                                    'smp' => 'bg-orange-100 text-orange-700',
                                ];
                            @endphp
                            <span class="inline-flex px-3 py-1 text-sm font-medium rounded-full {{ $jenjangColors[$ppdb->jenjang] ?? 'bg-gray-100 text-gray-700' }}">
                                {{ strtoupper($ppdb->jenjang) }}
                            </span>
                            @if($ppdb->jurusan)
                                <span class="text-gray-500">•</span>
                                <span class="text-gray-600">{{ $ppdb->jurusan }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.ppdb.edit', $ppdb) }}" 
                       class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                        <i class="fas fa-edit"></i>
                        Edit
                    </a>
                    <form action="{{ route('admin.ppdb.destroy', $ppdb) }}" method="POST" class="inline"
                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-red-300 text-red-600 rounded-lg hover:bg-red-50 transition-colors">
                            <i class="fas fa-trash"></i>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Content -->
        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Data Pribadi -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-user text-primary-500"></i>
                    Data Pribadi
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-500">Nama Lengkap</span>
                        <span class="font-medium text-gray-900">{{ $ppdb->nama_lengkap }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-500">NISN</span>
                        <span class="font-medium text-gray-900 font-mono">{{ $ppdb->nisn }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-500">TTL</span>
                        <span class="font-medium text-gray-900">{{ $ppdb->ttl }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-500">Jenis Kelamin</span>
                        <span class="font-medium text-gray-900">{{ $ppdb->jenis_kelamin_label }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-500">No. Telepon</span>
                        <span class="font-medium text-gray-900">{{ $ppdb->no_telepon ?: '-' }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-500">Email</span>
                        <span class="font-medium text-gray-900">{{ $ppdb->email ?: '-' }}</span>
                    </div>
                </div>
            </div>
            
            <!-- Data Alamat -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-primary-500"></i>
                    Alamat
                </h3>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-gray-700">{{ $ppdb->alamat }}</p>
                </div>
                
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2 pt-4">
                    <i class="fas fa-school text-primary-500"></i>
                    Sekolah Asal
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-500">Nama Sekolah</span>
                        <span class="font-medium text-gray-900">{{ $ppdb->sekolah_asal }}</span>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-gray-700 text-sm">{{ $ppdb->alamat_sekolah }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Status Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
            <i class="fas fa-clipboard-check text-primary-500"></i>
            Status Pendaftaran
        </h3>
        
        <form action="{{ route('admin.ppdb.update-status', $ppdb) }}" method="POST">
            @csrf
            @method('PATCH')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <div class="flex items-center gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="pending" 
                                   {{ $ppdb->status === 'pending' ? 'checked' : '' }}
                                   class="w-4 h-4 text-yellow-600 border-gray-300 focus:ring-yellow-500">
                            <span class="inline-flex items-center gap-1 px-3 py-1 text-sm font-medium rounded-full bg-yellow-100 text-yellow-700">
                                <i class="fas fa-clock"></i> Pending
                            </span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="diterima" 
                                   {{ $ppdb->status === 'diterima' ? 'checked' : '' }}
                                   class="w-4 h-4 text-green-600 border-gray-300 focus:ring-green-500">
                            <span class="inline-flex items-center gap-1 px-3 py-1 text-sm font-medium rounded-full bg-green-100 text-green-700">
                                <i class="fas fa-check-circle"></i> Diterima
                            </span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="ditolak" 
                                   {{ $ppdb->status === 'ditolak' ? 'checked' : '' }}
                                   class="w-4 h-4 text-red-600 border-gray-300 focus:ring-red-500">
                            <span class="inline-flex items-center gap-1 px-3 py-1 text-sm font-medium rounded-full bg-red-100 text-red-700">
                                <i class="fas fa-times-circle"></i> Ditolak
                            </span>
                        </label>
                    </div>
                </div>
                
                <div>
                    <label for="catatan" class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                    <textarea name="catatan" 
                              id="catatan" 
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none resize-none"
                              placeholder="Tambahkan catatan untuk pendaftar...">{{ $ppdb->catatan }}</textarea>
                </div>
            </div>
            
            <div class="mt-4 pt-4 border-t border-gray-200 flex justify-end">
                <button type="submit" 
                        class="inline-flex items-center gap-2 px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
    
    <!-- Timeline -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
            <i class="fas fa-history text-primary-500"></i>
            Informasi Waktu
        </h3>
        <div class="flex items-center gap-8 text-sm text-gray-500">
            <div>
                <span class="font-medium">Tanggal Daftar:</span>
                <span>{{ $ppdb->created_at->format('d F Y, H:i') }}</span>
            </div>
            <div>
                <span class="font-medium">Terakhir Diperbarui:</span>
                <span>{{ $ppdb->updated_at->format('d F Y, H:i') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
