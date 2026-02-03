@extends('layouts.admin')

@section('title', 'Data PPDB')
@section('header', 'Data Pendaftaran PPDB')

@section('content')
<div class="space-y-6">
    <!-- Header with Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Data Pendaftaran</h2>
            <p class="text-gray-500 mt-1">Kelola data pendaftaran siswa baru</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.ppdb.export', request()->query()) }}" 
               class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                <i class="fas fa-download"></i>
                <span class="hidden sm:inline">Export</span>
            </a>
        </div>
    </div>
    
    <!-- Jenjang Tabs -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="border-b border-gray-200">
            <nav class="flex -mb-px overflow-x-auto" aria-label="Tabs">
                <a href="{{ route('admin.ppdb.index', array_merge(request()->except('jenjang', 'page'), [])) }}" 
                   class="flex-shrink-0 px-6 py-4 border-b-2 font-medium text-sm transition-colors {{ !request('jenjang') || request('jenjang') === 'semua' ? 'border-primary-500 text-primary-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                    Semua
                    <span class="ml-2 px-2 py-0.5 rounded-full text-xs {{ !request('jenjang') || request('jenjang') === 'semua' ? 'bg-primary-100 text-primary-600' : 'bg-gray-100 text-gray-600' }}">
                        {{ $stats['semua'] }}
                    </span>
                </a>
                <a href="{{ route('admin.ppdb.index', array_merge(request()->except('page'), ['jenjang' => 'smk'])) }}" 
                   class="flex-shrink-0 px-6 py-4 border-b-2 font-medium text-sm transition-colors {{ request('jenjang') === 'smk' ? 'border-primary-500 text-primary-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                    <span class="inline-flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-primary-500"></span>
                        SMK
                    </span>
                    <span class="ml-2 px-2 py-0.5 rounded-full text-xs {{ request('jenjang') === 'smk' ? 'bg-primary-100 text-primary-600' : 'bg-gray-100 text-gray-600' }}">
                        {{ $stats['smk'] }}
                    </span>
                </a>
                <a href="{{ route('admin.ppdb.index', array_merge(request()->except('page'), ['jenjang' => 'sma'])) }}" 
                   class="flex-shrink-0 px-6 py-4 border-b-2 font-medium text-sm transition-colors {{ request('jenjang') === 'sma' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                    <span class="inline-flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                        SMA
                    </span>
                    <span class="ml-2 px-2 py-0.5 rounded-full text-xs {{ request('jenjang') === 'sma' ? 'bg-blue-100 text-blue-600' : 'bg-gray-100 text-gray-600' }}">
                        {{ $stats['sma'] }}
                    </span>
                </a>
                <a href="{{ route('admin.ppdb.index', array_merge(request()->except('page'), ['jenjang' => 'smp'])) }}" 
                   class="flex-shrink-0 px-6 py-4 border-b-2 font-medium text-sm transition-colors {{ request('jenjang') === 'smp' ? 'border-orange-500 text-orange-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                    <span class="inline-flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                        SMP
                    </span>
                    <span class="ml-2 px-2 py-0.5 rounded-full text-xs {{ request('jenjang') === 'smp' ? 'bg-orange-100 text-orange-600' : 'bg-gray-100 text-gray-600' }}">
                        {{ $stats['smp'] }}
                    </span>
                </a>
            </nav>
        </div>
        
        <!-- Filters -->
        <div class="p-4 border-b border-gray-200 bg-gray-50">
            <form action="{{ route('admin.ppdb.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
                @if(request('jenjang'))
                    <input type="hidden" name="jenjang" value="{{ request('jenjang') }}">
                @endif
                
                <!-- Search -->
                <div class="flex-1">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Cari nama, NISN, email, atau sekolah asal..."
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none">
                    </div>
                </div>
                
                <!-- Status Filter -->
                <div class="w-full sm:w-48">
                    <select name="status" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none"
                            onchange="this.form.submit()">
                        <option value="semua" {{ request('status') === 'semua' || !request('status') ? 'selected' : '' }}>Semua Status</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diterima" {{ request('status') === 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ request('status') === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
                
                <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">
                    <i class="fas fa-filter mr-1"></i> Filter
                </button>
                
                @if(request('search') || request('status'))
                    <a href="{{ route('admin.ppdb.index', ['jenjang' => request('jenjang')]) }}" 
                       class="px-4 py-2 text-gray-600 hover:text-gray-800 transition-colors">
                        <i class="fas fa-times mr-1"></i> Reset
                    </a>
                @endif
            </form>
        </div>
        
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <input type="checkbox" class="rounded border-gray-300" id="selectAll">
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">NISN</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Jenjang</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Jurusan</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Sekolah Asal</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($registrations as $reg)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-4">
                                <input type="checkbox" class="rounded border-gray-300 row-checkbox" value="{{ $reg->id }}">
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full {{ $reg->jenis_kelamin === 'L' ? 'bg-blue-100' : 'bg-pink-100' }} flex items-center justify-center">
                                        <i class="fas fa-{{ $reg->jenis_kelamin === 'L' ? 'male text-blue-600' : 'female text-pink-600' }}"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $reg->nama_lengkap }}</p>
                                        <p class="text-sm text-gray-500">{{ $reg->email ?: '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-gray-600 font-mono text-sm">{{ $reg->nisn }}</td>
                            <td class="px-4 py-4">
                                @php
                                    $jenjangColors = [
                                        'smk' => 'bg-primary-100 text-primary-700',
                                        'sma' => 'bg-blue-100 text-blue-700',
                                        'smp' => 'bg-orange-100 text-orange-700',
                                    ];
                                @endphp
                                <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full {{ $jenjangColors[$reg->jenjang] ?? 'bg-gray-100 text-gray-700' }}">
                                    {{ strtoupper($reg->jenjang) }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-gray-600">{{ $reg->jurusan ?: '-' }}</td>
                            <td class="px-4 py-4 text-gray-600">
                                <span class="line-clamp-1">{{ $reg->sekolah_asal }}</span>
                            </td>
                            <td class="px-4 py-4">
                                @php
                                    $statusColors = [
                                        'pending' => 'bg-yellow-100 text-yellow-700',
                                        'diterima' => 'bg-green-100 text-green-700',
                                        'ditolak' => 'bg-red-100 text-red-700',
                                    ];
                                    $statusIcons = [
                                        'pending' => 'fa-clock',
                                        'diterima' => 'fa-check-circle',
                                        'ditolak' => 'fa-times-circle',
                                    ];
                                @endphp
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-medium rounded-full {{ $statusColors[$reg->status] ?? 'bg-gray-100 text-gray-700' }}">
                                    <i class="fas {{ $statusIcons[$reg->status] ?? 'fa-question' }}"></i>
                                    {{ ucfirst($reg->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-500">{{ $reg->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.ppdb.show', $reg) }}" 
                                       class="p-2 text-gray-500 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition-colors"
                                       title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.ppdb.edit', $reg) }}" 
                                       class="p-2 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.ppdb.destroy', $reg) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-2 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                                                title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-4 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <i class="fas fa-inbox text-3xl text-gray-400"></i>
                                    </div>
                                    <p class="text-gray-500 font-medium">Tidak ada data pendaftaran</p>
                                    <p class="text-gray-400 text-sm mt-1">Data akan muncul setelah ada pendaftaran baru</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($registrations->hasPages())
            <div class="px-4 py-4 border-t border-gray-200">
                {{ $registrations->links() }}
            </div>
        @endif
    </div>
    
    <!-- Bulk Actions (Hidden by default) -->
    <div id="bulkActions" class="hidden fixed bottom-6 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-4">
        <span><span id="selectedCount">0</span> dipilih</span>
        <div class="w-px h-6 bg-gray-700"></div>
        <form action="{{ route('admin.ppdb.bulk-update') }}" method="POST" class="flex items-center gap-2">
            @csrf
            <input type="hidden" name="ids" id="bulkIds">
            <select name="status" class="bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-1 text-sm">
                <option value="pending">Pending</option>
                <option value="diterima">Diterima</option>
                <option value="ditolak">Ditolak</option>
            </select>
            <button type="submit" class="px-4 py-1 bg-primary-600 hover:bg-primary-700 rounded-lg text-sm">
                Update Status
            </button>
        </form>
        <button type="button" onclick="clearSelection()" class="text-gray-400 hover:text-white">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

@push('scripts')
<script>
    // Select All functionality
    const selectAllCheckbox = document.getElementById('selectAll');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    const bulkActions = document.getElementById('bulkActions');
    const selectedCount = document.getElementById('selectedCount');
    const bulkIds = document.getElementById('bulkIds');
    
    function updateBulkActions() {
        const checked = document.querySelectorAll('.row-checkbox:checked');
        if (checked.length > 0) {
            bulkActions.classList.remove('hidden');
            selectedCount.textContent = checked.length;
            bulkIds.value = Array.from(checked).map(cb => cb.value).join(',');
        } else {
            bulkActions.classList.add('hidden');
        }
    }
    
    selectAllCheckbox?.addEventListener('change', function() {
        rowCheckboxes.forEach(cb => cb.checked = this.checked);
        updateBulkActions();
    });
    
    rowCheckboxes.forEach(cb => {
        cb.addEventListener('change', function() {
            const allChecked = Array.from(rowCheckboxes).every(cb => cb.checked);
            selectAllCheckbox.checked = allChecked;
            updateBulkActions();
        });
    });
    
    function clearSelection() {
        selectAllCheckbox.checked = false;
        rowCheckboxes.forEach(cb => cb.checked = false);
        updateBulkActions();
    }
</script>
@endpush
@endsection
