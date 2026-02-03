@extends('layouts.admin')

@section('title', 'Edit Pendaftaran')
@section('header', 'Edit Data Pendaftaran')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Back Button -->
    <a href="{{ route('admin.ppdb.show', $ppdb) }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-primary-600 transition-colors">
        <i class="fas fa-arrow-left"></i>
        <span>Kembali ke Detail</span>
    </a>
    
    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-900">Edit Data Pendaftaran</h2>
            <p class="text-gray-500 mt-1">Perbarui informasi pendaftaran siswa</p>
        </div>
        
        <form action="{{ route('admin.ppdb.update', $ppdb) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Lengkap -->
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                    <input type="text" 
                           name="nama_lengkap" 
                           id="nama_lengkap"
                           value="{{ old('nama_lengkap', $ppdb->nama_lengkap) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none @error('nama_lengkap') border-red-500 @enderror"
                           required>
                    @error('nama_lengkap')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- NISN -->
                <div>
                    <label for="nisn" class="block text-sm font-medium text-gray-700 mb-2">NISN *</label>
                    <input type="text" 
                           name="nisn" 
                           id="nisn"
                           value="{{ old('nisn', $ppdb->nisn) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none @error('nisn') border-red-500 @enderror"
                           required>
                    @error('nisn')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Tempat Lahir -->
                <div>
                    <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tempat Lahir *</label>
                    <input type="text" 
                           name="tempat_lahir" 
                           id="tempat_lahir"
                           value="{{ old('tempat_lahir', $ppdb->tempat_lahir) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none @error('tempat_lahir') border-red-500 @enderror"
                           required>
                    @error('tempat_lahir')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Tanggal Lahir -->
                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir *</label>
                    <input type="date" 
                           name="tanggal_lahir" 
                           id="tanggal_lahir"
                           value="{{ old('tanggal_lahir', $ppdb->tanggal_lahir->format('Y-m-d')) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none @error('tanggal_lahir') border-red-500 @enderror"
                           required>
                    @error('tanggal_lahir')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Jenis Kelamin -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin *</label>
                    <div class="flex items-center gap-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="jenis_kelamin" value="L" 
                                   {{ old('jenis_kelamin', $ppdb->jenis_kelamin) === 'L' ? 'checked' : '' }}
                                   class="w-4 h-4 text-primary-600 border-gray-300 focus:ring-primary-500">
                            <span>Laki-laki</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="jenis_kelamin" value="P" 
                                   {{ old('jenis_kelamin', $ppdb->jenis_kelamin) === 'P' ? 'checked' : '' }}
                                   class="w-4 h-4 text-primary-600 border-gray-300 focus:ring-primary-500">
                            <span>Perempuan</span>
                        </label>
                    </div>
                    @error('jenis_kelamin')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- No Telepon -->
                <div>
                    <label for="no_telepon" class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                    <input type="text" 
                           name="no_telepon" 
                           id="no_telepon"
                           value="{{ old('no_telepon', $ppdb->no_telepon) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none @error('no_telepon') border-red-500 @enderror">
                    @error('no_telepon')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" 
                           name="email" 
                           id="email"
                           value="{{ old('email', $ppdb->email) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Jenjang -->
                <div>
                    <label for="jenjang" class="block text-sm font-medium text-gray-700 mb-2">Jenjang *</label>
                    <select name="jenjang" 
                            id="jenjang"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none @error('jenjang') border-red-500 @enderror"
                            required>
                        <option value="smk" {{ old('jenjang', $ppdb->jenjang) === 'smk' ? 'selected' : '' }}>SMK</option>
                        <option value="sma" {{ old('jenjang', $ppdb->jenjang) === 'sma' ? 'selected' : '' }}>SMA</option>
                        <option value="smp" {{ old('jenjang', $ppdb->jenjang) === 'smp' ? 'selected' : '' }}>SMP</option>
                    </select>
                    @error('jenjang')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Jurusan -->
                <div>
                    <label for="jurusan" class="block text-sm font-medium text-gray-700 mb-2">Jurusan</label>
                    <input type="text" 
                           name="jurusan" 
                           id="jurusan"
                           value="{{ old('jurusan', $ppdb->jurusan) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none @error('jurusan') border-red-500 @enderror"
                           placeholder="Contoh: PPLG, IPA, IPS">
                    @error('jurusan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                    <select name="status" 
                            id="status"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none @error('status') border-red-500 @enderror"
                            required>
                        <option value="pending" {{ old('status', $ppdb->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diterima" {{ old('status', $ppdb->status) === 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ old('status', $ppdb->status) === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Alamat -->
                <div class="md:col-span-2">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat *</label>
                    <textarea name="alamat" 
                              id="alamat"
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none resize-none @error('alamat') border-red-500 @enderror"
                              required>{{ old('alamat', $ppdb->alamat) }}</textarea>
                    @error('alamat')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Sekolah Asal -->
                <div>
                    <label for="sekolah_asal" class="block text-sm font-medium text-gray-700 mb-2">Sekolah Asal *</label>
                    <input type="text" 
                           name="sekolah_asal" 
                           id="sekolah_asal"
                           value="{{ old('sekolah_asal', $ppdb->sekolah_asal) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none @error('sekolah_asal') border-red-500 @enderror"
                           required>
                    @error('sekolah_asal')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Alamat Sekolah -->
                <div>
                    <label for="alamat_sekolah" class="block text-sm font-medium text-gray-700 mb-2">Alamat Sekolah *</label>
                    <textarea name="alamat_sekolah" 
                              id="alamat_sekolah"
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none resize-none @error('alamat_sekolah') border-red-500 @enderror"
                              required>{{ old('alamat_sekolah', $ppdb->alamat_sekolah) }}</textarea>
                    @error('alamat_sekolah')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Catatan -->
                <div class="md:col-span-2">
                    <label for="catatan" class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                    <textarea name="catatan" 
                              id="catatan"
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none resize-none @error('catatan') border-red-500 @enderror"
                              placeholder="Catatan internal admin...">{{ old('catatan', $ppdb->catatan) }}</textarea>
                    @error('catatan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Actions -->
            <div class="mt-6 pt-6 border-t border-gray-200 flex items-center justify-end gap-4">
                <a href="{{ route('admin.ppdb.show', $ppdb) }}" 
                   class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        class="inline-flex items-center gap-2 px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
