@extends('layouts.admin')

@section('title', 'Edit User')
@section('header', 'Edit User')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Back Button -->
    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-primary-600 transition-colors mb-6">
        <i class="fas fa-arrow-left text-sm"></i>
        <span class="font-medium">Kembali ke Daftar</span>
    </a>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Edit Profil User</h3>
                <p class="text-sm text-gray-500">Perbarui informasi akun dan hak akses.</p>
            </div>
            <div class="w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 font-bold text-xl uppercase">
                {{ substr($user->name, 0, 1) }}
            </div>
        </div>

        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                           class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                           class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role / Hak Akses</label>
                    <select name="role" id="role" required
                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm @error('role') border-red-500 @enderror">
                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>Regular User</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrator</option>
                    </select>
                    @error('role')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-blue-50 rounded-xl p-4 border border-blue-100 mb-4">
                    <p class="text-xs text-blue-700 flex gap-2">
                        <i class="fas fa-info-circle mt-0.5"></i>
                        <span>Kosongkan password jika Anda tidak ingin mengubahnya.</span>
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                        <input type="password" name="password" id="password"
                               class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm @error('password') border-red-500 @enderror"
                               placeholder="Opsional">
                        @error('password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Confirmation -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm"
                               placeholder="Opsional">
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" 
                        class="w-full inline-flex items-center justify-center px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl transition-all shadow-lg shadow-primary-200 gap-2">
                    <i class="fas fa-sync-alt"></i>
                    <span>Perbarui Data User</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
