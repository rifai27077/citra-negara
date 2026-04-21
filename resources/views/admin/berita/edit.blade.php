@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('header', 'Edit Berita')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Back Button -->
    <a href="{{ route('admin.berita.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-primary-600 transition-colors">
        <i class="fas fa-arrow-left"></i>
        <span>Kembali ke Daftar</span>
    </a>
    
    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-900">Edit Berita</h2>
            <p class="text-gray-500 mt-1">Perbarui konten berita</p>
        </div>
        
        <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Judul -->
                <div>
                    <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul Berita *</label>
                    <input type="text" 
                           name="judul" 
                           id="judul"
                           value="{{ old('judul', $berita->judul) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none text-lg @error('judul') border-red-500 @enderror"
                           required>
                    @error('judul')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Jenjang -->
                    <div>
                        <label for="jenjang" class="block text-sm font-medium text-gray-700 mb-2">Jenjang *</label>
                        <select name="jenjang" 
                                id="jenjang"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none @error('jenjang') border-red-500 @enderror"
                                required>
                            <option value="umum" {{ old('jenjang', $berita->jenjang) === 'umum' ? 'selected' : '' }}>Umum (Semua)</option>
                            <option value="smk" {{ old('jenjang', $berita->jenjang) === 'smk' ? 'selected' : '' }}>SMK</option>
                            <option value="sma" {{ old('jenjang', $berita->jenjang) === 'sma' ? 'selected' : '' }}>SMA</option>
                            <option value="smp" {{ old('jenjang', $berita->jenjang) === 'smp' ? 'selected' : '' }}>SMP</option>
                        </select>
                        @error('jenjang')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Kategori -->
                    <div>
                        <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <input type="text" 
                               name="kategori" 
                               id="kategori"
                               value="{{ old('kategori', $berita->kategori) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none @error('kategori') border-red-500 @enderror">
                        @error('kategori')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Gambar -->
                <div>
                    <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Gambar Cover</label>
                    @if($berita->gambar)
                        <div class="mb-4 p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-500 mb-2">Gambar saat ini:</p>
                            <img src="{{ $berita->gambar_url }}" alt="" class="max-h-48 rounded-lg">
                        </div>
                    @endif
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-primary-400 transition-colors"
                         x-data="{ preview: null }">
                        <template x-if="!preview">
                            <div>
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                                <p class="text-gray-600 mb-2">{{ $berita->gambar ? 'Ganti gambar' : 'Upload gambar' }}</p>
                                <label for="gambar" class="cursor-pointer text-primary-600 hover:text-primary-700 font-medium">
                                    pilih file
                                </label>
                                <p class="text-sm text-gray-400 mt-2">PNG, JPG, WEBP (Max. 2MB)</p>
                            </div>
                        </template>
                        <template x-if="preview">
                            <div class="relative">
                                <img :src="preview" alt="Preview" class="max-h-48 mx-auto rounded-lg">
                                <button type="button" 
                                        @click="preview = null; document.getElementById('gambar').value = ''"
                                        class="absolute top-0 right-0 -mt-2 -mr-2 p-1 bg-red-500 text-white rounded-full hover:bg-red-600">
                                    <i class="fas fa-times text-xs"></i>
                                </button>
                            </div>
                        </template>
                        <input type="file" 
                               name="gambar" 
                               id="gambar"
                               accept="image/*"
                               class="hidden"
                               @change="preview = URL.createObjectURL($event.target.files[0])">
                    </div>
                    @error('gambar')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Excerpt -->
                <div>
                    <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Ringkasan</label>
                    <textarea name="excerpt" 
                              id="excerpt"
                              rows="2"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none resize-none @error('excerpt') border-red-500 @enderror">{{ old('excerpt', $berita->excerpt) }}</textarea>
                    @error('excerpt')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Konten -->
                <div>
                    <label for="konten" class="block text-sm font-medium text-gray-700 mb-2">Konten Berita *</label>
                    <textarea name="konten" 
                              id="konten"
                              rows="15"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none @error('konten') border-red-500 @enderror"
                              required>{{ old('konten', $berita->konten) }}</textarea>
                    @error('konten')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Publish Toggle -->
                <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_published" value="1" class="sr-only peer" {{ old('is_published', $berita->is_published) ? 'checked' : '' }}>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                    </label>
                    <div>
                        <p class="font-medium text-gray-900">Publikasikan</p>
                        <p class="text-sm text-gray-500">
                            @if($berita->is_published)
                                Berita ini sudah dipublikasikan
                            @else
                                Berita ini masih draft
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Actions -->
            <div class="mt-6 pt-6 border-t border-gray-200 flex items-center justify-end gap-4">
                <a href="{{ route('admin.berita.index') }}" 
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
