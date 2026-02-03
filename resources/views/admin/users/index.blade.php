@extends('layouts.admin')

@section('title', 'Manajemen User')
@section('header', 'Manajemen User')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-lg font-semibold text-gray-800">Daftar Pengguna</h3>
            <p class="text-sm text-gray-500">Kelola akses administrator dan user website.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" 
           class="inline-flex items-center justify-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors gap-2">
            <i class="fas fa-plus text-sm"></i>
            <span>Tambah User</span>
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
            <p class="text-sm font-medium text-gray-500">Total User</p>
            <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
        </div>
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 border-l-4 border-primary-500">
            <p class="text-sm font-medium text-gray-500">Administrator</p>
            <p class="text-2xl font-bold text-primary-600">{{ $stats['admin'] }}</p>
        </div>
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 border-l-4 border-blue-500">
            <p class="text-sm font-medium text-gray-500">Regular User</p>
            <p class="text-2xl font-bold text-blue-600">{{ $stats['user'] }}</p>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
        <form action="{{ route('admin.users.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Cari nama atau email..." 
                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 text-sm">
                </div>
            </div>
            <div class="sm:w-48">
                <select name="role" onchange="this.form.submit()" 
                        class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-lg focus:outline-none focus:ring-primary-500 focus:border-primary-500 text-sm">
                    <option value="">Semua Role</option>
                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>
            @if(request()->anyFilled(['search', 'role']))
                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 text-sm text-gray-600 hover:text-gray-900">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-sm font-semibold text-gray-600">
                        <th class="px-6 py-4">User</th>
                        <th class="px-6 py-4">Role</th>
                        <th class="px-6 py-4">Dibuat Pada</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 font-bold">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">{{ $user->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex px-2 py-1 rounded-full text-xs font-medium {{ $user->role === 'admin' ? 'bg-primary-100 text-primary-700' : 'bg-blue-100 text-blue-700' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-500">
                                {{ $user->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.users.edit', $user) }}" 
                                       class="p-2 text-gray-400 hover:text-primary-600 transition-colors"
                                       title="Edit User">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" 
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-gray-400 hover:text-red-600 transition-colors"
                                                    title="Hapus User">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                <i class="fas fa-users-slash text-4xl mb-4 block opacity-20"></i>
                                <p>Tidak ada pengguna yang ditemukan.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($users->hasPages())
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
