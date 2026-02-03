<footer class="bg-primary text-white pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-6">
        <div
            x-data="{
                desktop: window.innerWidth >= 768,
                infoOpen: true,
                exploreOpen: false,
                resourcesOpen: false,
                contactOpen: false
            }"
            x-init="window.addEventListener('resize', () => {
                desktop = window.innerWidth >= 768;
            })"
            class="grid grid-cols-1 md:grid-cols-5 gap-12 items-start"
        >
            <!-- Logo & Identitas -->
            <div class="md:col-span-2 pr-6 md:pr-10">
                <div class="flex items-center gap-4 mb-6">
                    <img 
                        src="{{ asset('images/logo-cn.png') }}" 
                        alt="Logo Citra Negara" 
                        class="w-16 h-auto object-contain"
                    />

                    <div>
                        <h2 class="text-2xl font-display font-bold tracking-tight">Citra Negara</h2>
                        <p class="text-xs font-medium tracking-wide text-gray-200">YAYASAN AT-TAQWA KEMIRI JAYA</p>
                    </div>
                </div>

                <p class="text-sm leading-relaxed text-gray-200 mb-6 max-w-sm">
                    Mewujudkan generasi yang unggul, berkhlak mulia, dan kompetitif di era global. Sekolah pilihan terbaik di Depok.
                </p>

                <div class="space-y-1 text-sm text-gray-200">
                     <p>Jl. Tanah Baru Jl. Kemiri Jaya No.99, Beji,</p>
                     <p>Kecamatan Beji, Kota Depok, Jawa Barat 16421</p>
                </div>

                <div class="flex gap-4 mt-8">
                    <a href="https://www.youtube.com/@citranegaratv9070" target="_blank" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-red-600 hover:text-white transition-all duration-300 group">
                        <i class="fa-brands fa-youtube text-lg group-hover:scale-110 transition-transform"></i>
                    </a>
                    <a href="https://instagram.com/smkcitranegaradepok" target="_blank" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-pink-600 hover:text-white transition-all duration-300 group">
                        <i class="fa-brands fa-instagram text-lg group-hover:scale-110 transition-transform"></i>
                    </a>
                    <a href="https://facebook.com/smkcitranegaraofficial" target="_blank" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all duration-300 group">
                        <i class="fa-brands fa-facebook text-lg group-hover:scale-110 transition-transform"></i>
                    </a>
                    <a href="https://x.com/citranegaraa" target="_blank" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-sky-500 hover:text-white transition-all duration-300 group">
                        <i class="fa-brands fa-twitter text-lg group-hover:scale-110 transition-transform"></i>
                    </a>
                </div>
            </div>

            <!-- Wrapper kanan -->
            <div class="md:col-span-3 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-10 gap-x-8 md:justify-end">
                <!-- Information -->
                <div class="border-b border-white/10 md:border-none pb-4 md:pb-0">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-lg text-white">Informasi</h3>
                        <button class="md:hidden p-1 text-primary-200" @click="infoOpen = !infoOpen">
                            <i class="fa-solid" :class="infoOpen ? 'fa-minus' : 'fa-plus'"></i>
                        </button>
                    </div>
                    <div x-show="desktop || infoOpen" x-collapse>
                        <ul class="space-y-3 text-sm text-gray-200">
                            <li><a href="{{ url('/#yayasan') }}" class="hover:text-secondary hover:translate-x-1 block transition-all duration-200">Yayasan</a></li>
                            <li><a href="{{ url('/#sekolah') }}" class="hover:text-secondary hover:translate-x-1 block transition-all duration-200">Sekolah</a></li>
                            <li><a href="{{ url('/berita') }}" class="hover:text-secondary hover:translate-x-1 block transition-all duration-200">Berita</a></li>
                            <li><a href="{{ url('/kontak') }}" class="hover:text-secondary hover:translate-x-1 block transition-all duration-200">Kontak</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Explore -->
                <div class="border-b border-white/10 md:border-none pb-4 md:pb-0">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-lg text-white">Unit Pendidikan</h3>
                        <button class="md:hidden p-1 text-primary-200" @click="exploreOpen = !exploreOpen">
                            <i class="fa-solid" :class="exploreOpen ? 'fa-minus' : 'fa-plus'"></i>
                        </button>
                    </div>
                    <div x-show="desktop || exploreOpen" x-collapse>
                        <ul class="space-y-3 text-sm text-gray-200">
                            <li><a href="{{ url('/smp') }}" class="hover:text-secondary hover:translate-x-1 block transition-all duration-200">SMP Citra Negara</a></li>
                            <li><a href="{{ url('/sma') }}" class="hover:text-secondary hover:translate-x-1 block transition-all duration-200">SMA Citra Negara</a></li>
                            <li><a href="{{ url('/smk') }}" class="hover:text-secondary hover:translate-x-1 block transition-all duration-200">SMK Citra Negara</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="border-b border-white/10 md:border-none pb-4 md:pb-0">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-lg text-white">Hubungi Kami</h3>
                        <button class="md:hidden p-1 text-primary-200" @click="contactOpen = !contactOpen">
                             <i class="fa-solid" :class="contactOpen ? 'fa-minus' : 'fa-plus'"></i>
                        </button>
                    </div>
                    <div x-show="desktop || contactOpen" x-collapse>
                        <div class="text-sm space-y-4 text-gray-200">
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-envelope mt-1 text-secondary"></i>
                                <a href="mailto:info@citranegara.sch.id" class="hover:text-white transition">info@citranegara.sch.id</a>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-phone mt-1 text-secondary"></i>
                                <a href="tel:02177201052" class="hover:text-white transition">(021) 77201052</a>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-clock mt-1 text-secondary"></i>
                                <div>
                                    <p>Senin - Jumat: 07.00 - 17.00</p>
                                    <p>Sabtu: 07.00 - 15.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-16 border-t border-white/40 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-200">
            <p>© 2025 Citra Negara. All rights reserved.</p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-white transition">Privacy Policy</a>
                <a href="#" class="hover:text-white transition">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
