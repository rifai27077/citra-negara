<section class="py-20 bg-white" id="ekstrakurikuler">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-[#699D15] font-semibold tracking-wider uppercase">Pengembangan Diri</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-[#2F2F2F] mt-2">Ekstrakurikuler</h2>
            <div class="w-24 h-1 bg-[#699D15] mx-auto mt-4 rounded-full"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                Wadah penyaluran bakat dan minat siswa untuk membentuk karakter yang unggul dan berprestasi.
            </p>
        </div>

        <div x-data="{ activeTab: 'all' }" class="space-y-8">
            <!-- Filter Tabs -->
            <div class="flex flex-wrap justify-center gap-4 mb-10">
                <button @click="activeTab = 'all'" 
                    :class="{ 'bg-[#699D15] text-white': activeTab === 'all', 'bg-gray-100 text-gray-600 hover:bg-gray-200': activeTab !== 'all' }"
                    class="px-6 py-2 rounded-full font-semibold transition-all duration-300">
                    Semua
                </button>
                <button @click="activeTab = 'SMA'" 
                    :class="{ 'bg-[#699D15] text-white': activeTab === 'SMA', 'bg-gray-100 text-gray-600 hover:bg-gray-200': activeTab !== 'SMA' }"
                    class="px-6 py-2 rounded-full font-semibold transition-all duration-300">
                    SMA
                </button>
                <button @click="activeTab = 'SMP'" 
                    :class="{ 'bg-[#699D15] text-white': activeTab === 'SMP', 'bg-gray-100 text-gray-600 hover:bg-gray-200': activeTab !== 'SMP' }"
                    class="px-6 py-2 rounded-full font-semibold transition-all duration-300">
                    SMP
                </button>
                <button @click="activeTab = 'SMK'" 
                    :class="{ 'bg-[#699D15] text-white': activeTab === 'SMK', 'bg-gray-100 text-gray-600 hover:bg-gray-200': activeTab !== 'SMK' }"
                    class="px-6 py-2 rounded-full font-semibold transition-all duration-300">
                    SMK
                </button>
            </div>

            <!-- Grid Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $ekstrakurikulers = \App\Models\Ekstrakurikuler::all();
                @endphp

                @foreach($ekstrakurikulers as $eskul)
                    <div x-show="activeTab === 'all' || activeTab === '{{ $eskul->category }}'" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                        
                        <!-- Image -->
                        <div class="h-48 overflow-hidden relative">
                            <img src="{{ $eskul->image ? asset('storage/' . $eskul->image) : asset('/images/placeholder.jpg') }}" 
                                 alt="{{ $eskul->name }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <span class="absolute bottom-4 left-4 bg-[#699D15] text-white text-xs px-3 py-1 rounded-full font-medium">
                                {{ $eskul->category }}
                            </span>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-[#2F2F2F] mb-2 group-hover:text-[#699D15] transition-colors">
                                {{ $eskul->name }}
                            </h3>
                            <a href="{{ route(strtolower($eskul->category) . '.ekstrakurikuler.show', $eskul->slug) }}" class="inline-flex items-center text-sm font-semibold text-[#699D15] hover:tracking-wide transition-all">
                                Lihat Detail
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            @if($ekstrakurikulers->isEmpty())
                <div class="text-center py-10">
                    <p class="text-gray-500">Belum ada data ekstrakurikuler.</p>
                </div>
            @endif
        </div>
    </div>
</section>
