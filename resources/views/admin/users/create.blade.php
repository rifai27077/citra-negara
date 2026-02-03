@extends('layouts.admin')

@section('title', 'Tambah User')
@section('header', 'Tambah User')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Back Button -->
    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-primary-600 transition-colors mb-6">
        <i class="fas fa-arrow-left text-sm"></i>
        <span class="font-medium">Kembali ke Daftar</span>
    </a>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800">Informasi User Baru</h3>
            <p class="text-sm text-gray-500">Isi detail akun untuk memberikan akses ke panel admin.</p>
        </div>

        <form action="{{ route('admin.users.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <div class="space-y-4">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                           class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm @error('name') border-red-500 @enderror"
                           placeholder="Masukkan nama lengkap...">
                    @error('name')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                           class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm @error('email') border-red-500 @enderror"
                           placeholder="nama@email.com">
                    @error('email')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role / Hak Akses</label>
                    <select name="role" id="role" required
                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm @error('role') border-red-500 @enderror">
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Regular User</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                    </select>
                    @error('role')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" id="password" required
                               class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm @error('password') border-red-500 @enderror"
                               placeholder="Min. 8 karakter">
                        @error('password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Confirmation -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                               class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm"
                               placeholder="Ulangi password">
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" 
                        class="w-full inline-flex items-center justify-center px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl transition-all shadow-lg shadow-primary-200 gap-2">
                    <i class="fas fa-save"></i>
                    <span>Simpan User Baru</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
