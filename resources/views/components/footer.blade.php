<footer class="bg-gradient-to-br from-[#6BAE18] to-[#5C8F14] pt-24 pb-12 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary/10 rounded-full blur-[120px] -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-secondary/5 rounded-full blur-[120px] translate-y-1/2"></div>
    <div class="absolute inset-0 opacity-[0.03] bg-[url('/images/pattern-light.svg')] bg-repeat pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
     
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-12 lg:gap-8">
            <!-- Brand Column -->
            <div class="lg:col-span-2">
                <div class="flex items-center gap-4 mb-8 group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-primary/20 blur-xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="{{ asset('images/logo-cn.png') }}" alt="Logo Citra Negara" class="relative w-16 h-16 object-contain" />
                    </div>
                    <div>
                        <h2 class="text-2xl text-white tracking-tight">Citra Negara</h2>
                        <p class="text-[10px] text-white tracking-[0.2em] text-primary uppercase">Yayasan At-Taqwa Kemiri Jaya</p>
                    </div>
                </div>
                
                <p class="text-white leading-relaxed mb-8 max-w-sm text-lg italic">
                    "Mewujudkan generasi yang unggul, berakhlak mulia, dan kompetitif di era global."
                </p>

                <div class="flex gap-3">
                    @php
                        $socials = [
                            ['icon' => 'fa-youtube', 'link' => 'https://www.youtube.com/@citranegaratv9070', 'color' => 'hover:bg-red-600'],
                            ['icon' => 'fa-instagram', 'link' => 'https://instagram.com/smkcitranegaradepok', 'color' => 'hover:bg-pink-600'],
                            ['icon' => 'fa-facebook', 'link' => 'https://facebook.com/smkcitranegaraofficial', 'color' => 'hover:bg-blue-600'],
                            ['icon' => 'fa-x-twitter', 'link' => 'https://x.com/citranegaraa', 'color' => 'hover:bg-black'],
                        ];
                    @endphp
                    @foreach ($socials as $social)
                        <a href="{{ $social['link'] }}" target="_blank" class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-secondary {{ $social['color'] }} hover:text-white hover:border-transparent transition-all duration-300 group">
                            <i class="fa-brands {{ $social['icon'] }} text-xl group-hover:scale-110 transition-transform"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Navigation Column -->
            <div>
                <h3 class="text-white font-black uppercase tracking-widest text-xs mb-8 flex items-center gap-2">
                    <span class="w-2 h-2 bg-secondary rounded-full"></span>
                    Informasi
                </h3>
                <ul class="space-y-4">
                    <li><a href="{{ url('/#yayasan') }}" class="text-white hover:text-secondary transition-colors flex items-center group">
                        <span class="w-0 group-hover:w-4 h-[2px] bg-primary transition-all mr-0 group-hover:mr-2"></span>
                        Yayasan
                    </a></li>
                    <li><a href="{{ url('/#sekolah') }}" class="text-white hover:text-secondary transition-colors flex items-center group">
                        <span class="w-0 group-hover:w-4 h-[2px] bg-primary transition-all mr-0 group-hover:mr-2"></span>
                        Sekolah
                    </a></li>
                    <li><a href="{{ url('/berita') }}" class="text-white hover:text-secondary transition-colors flex items-center group">
                        <span class="w-0 group-hover:w-4 h-[2px] bg-primary transition-all mr-0 group-hover:mr-2"></span>
                        Berita
                    </a></li>
                    <li><a href="{{ url('/kontak') }}" class="text-white hover:text-secondary transition-colors flex items-center group">
                        <span class="w-0 group-hover:w-4 h-[2px] bg-primary transition-all mr-0 group-hover:mr-2"></span>
                        Kontak
                    </a></li>
                </ul>
            </div>

            <!-- Units Column -->
            <div>
                <h3 class="text-white font-black uppercase tracking-widest text-xs mb-8 flex items-center gap-2">
                    <span class="w-2 h-2 bg-secondary rounded-full"></span>
                    Unit
                </h3>
                <ul class="space-y-4">
                    <li><a href="{{ url('/smp') }}" class="text-white hover:text-secondary transition-colors flex items-center group">
                        <span class="w-0 group-hover:w-4 h-[2px] bg-secondary transition-all mr-0 group-hover:mr-2"></span>
                        SMP Citra Negara
                    </a></li>
                    <li><a href="{{ url('/sma') }}" class="text-white hover:text-secondary transition-colors flex items-center group">
                        <span class="w-0 group-hover:w-4 h-[2px] bg-secondary transition-all mr-0 group-hover:mr-2"></span>
                        SMA Citra Negara
                    </a></li>
                    <li><a href="{{ url('/smk') }}" class="text-white hover:text-secondary transition-colors flex items-center group">
                        <span class="w-0 group-hover:w-4 h-[2px] bg-secondary transition-all mr-0 group-hover:mr-2"></span>
                        SMK Citra Negara
                    </a></li>
                </ul>
            </div>

            <!-- Contact Column -->
            <div class="lg:col-span-2">
                <h3 class="text-white font-black uppercase tracking-widest text-xs mb-8 flex items-center gap-2">
                    <span class="w-2 h-2 bg-white rounded-full"></span>
                    Hubungi Kami
                </h3>
                <div class="space-y-6">
                    <div class="flex items-start gap-4 group">
                        <div class="w-10 h-10 shrink-0 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                            <i class="fa-solid fa-location-dot text-secondary"></i>
                        </div>
                        <p class="text-white text-sm leading-relaxed">
                            Jl. Tanah Baru Jl. Kemiri Jaya No.99, Beji, <br>
                            Kecamatan Beji, Kota Depok, Jawa Barat 16421
                        </p>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div class="w-10 h-10 shrink-0 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                            <i class="fa-solid fa-phone text-secondary"></i>
                        </div>
                        <a href="tel:02177201052" class="text-white hover:text-white transition text-sm font-bold tracking-tight">(021) 77201052</a>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div class="w-10 h-10 shrink-0 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                            <i class="fa-solid fa-envelope text-secondary"></i>
                        </div>
                        <a href="mailto:info@citranegara.sch.id" class="text-white hover:text-white transition text-sm">info@citranegara.sch.id</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-24 pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex flex-col md:flex-row items-center gap-2 md:gap-4">
                <p class="text-white text-xs font-medium tracking-wide">
                    &copy; {{ date('Y') }} <span class="text-white font-bold">Citra Negara</span>. All rights reserved.
                </p>
                <span class="hidden md:block w-1 h-1 bg-gray-800 rounded-full"></span>
                <p class="text-white text-[10px] font-bold uppercase tracking-[0.2em]">Excellence in Education</p>
            </div>
            
            <div class="flex items-center gap-8">
                <a href="#" class="text-white hover:text-white text-[10px] font-bold uppercase tracking-widest transition-colors">Privacy Policy</a>
                <a href="#" class="text-white hover:text-white text-[10px] font-bold uppercase tracking-widest transition-colors">Terms of Service</a>
                
                <div class="relative group cursor-pointer ml-4">
                    <div class="absolute inset-0 bg-primary/20 blur-lg rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <img src="/images/robi.png" alt="Robi Icon" class="relative w-10 h-10 object-contain hover:scale-110 transition-transform">
                </div>
            </div>
        </div>
    </div>
</footer>
