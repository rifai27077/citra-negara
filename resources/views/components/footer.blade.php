<footer class="bg-[#699D15] text-white py-12">
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
                <div class="flex items-center gap-3 mb-4">
                    <img 
                        src="{{ asset('images/logo-cn.png') }}" 
                        alt="Logo Citra Negara" 
                        class="w-14 h-auto object-contain"
                    />

                    <div>
                        <h2 class="text-xl font-bold">Citra Negara</h2>
                        <p class="text-sm opacity-90">YAYASAN AT-TAQWA KEMIRI JAYA</p>
                    </div>
                </div>

                <p class="text-sm leading-relaxed opacity-90">
                    Jl. Tanah Baru Jl. Kemiri Jaya No.99, Beji,<br>
                    Kecamatan Beji, Kota Depok, Jawa Barat 16421
                </p>

                <div class="flex gap-4 mt-5 text-xl">
                    <a href="https://www.youtube.com/@citranegaratv9070" target="_blank" class="hover:text-red-500 transition">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a href="https://instagram.com/smkcitranegaradepok" target="_blank" class="hover:text-pink-500 transition">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://facebook.com/smkcitranegaraofficial" target="_blank" class="hover:text-blue-500 transition">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="https://x.com/citranegaraa" target="_blank" class="hover:text-sky-400 transition">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </div>
            </div>

            <!-- Wrapper kanan -->
            <div class="md:col-span-3 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-y-8 gap-x-12 md:justify-end pr-6 md:pr-12">
                <!-- Information -->
                <div class="border-b md:border-none mt-2 md:mt-4">
                    <div class="flex items-center justify-between">
                        <h3 class="font-semibold uppercase tracking-wide">Informasi</h3>
                        <button class="md:hidden p-2" @click="infoOpen = !infoOpen">
                            <span x-text="infoOpen ? '-' : '+'"></span>
                        </button>
                    </div>
                    <div x-show="desktop || infoOpen" x-collapse class="mt-3">
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ url('/#yayasan') }}" class="hover:underline">Yayasan</a></li>
                            <li><a href="{{ url('/#sekolah') }}" class="hover:underline">Sekolah</a></li>
                            <li><a href="{{ url('/berita') }}" class="hover:underline">Berita</a></li>
                            <li><a href="{{ url('/kontak') }}" class="hover:underline">Kontak</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Explore -->
                <div class="border-b md:border-none mt-2 md:mt-4">
                    <div class="flex items-center justify-between">
                        <h3 class="font-semibold uppercase tracking-wide">Unit Pendidikan</h3>
                        <button class="md:hidden p-2" @click="exploreOpen = !exploreOpen">
                            <span x-text="exploreOpen ? '-' : '+'"></span>
                        </button>
                    </div>
                    <div x-show="desktop || exploreOpen" x-collapse class="mt-3">
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ url('/smp') }}" class="hover:underline">SMP Citra Negara</a></li>
                            <li><a href="{{ url('/sma') }}" class="hover:underline">SMA Citra Negara</a></li>
                            <li><a href="{{ url('/smk') }}" class="hover:underline">SMK Citra Negara</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="border-b md:border-none mt-2 md:mt-4">
                    <div class="flex items-center justify-between">
                        <h3 class="font-semibold uppercase tracking-wide">Info Kontak</h3>
                        <button class="md:hidden p-2" @click="contactOpen = !contactOpen">
                            <span x-text="contactOpen ? '-' : '+'"></span>
                        </button>
                    </div>
                    <div x-show="desktop || contactOpen" x-collapse class="mt-3">
                        <div class="text-sm space-y-2">
                            <p><a href="mailto:info@citranegara.sch.id" class="hover:underline break-words">info@citranegara.sch.id</a></p>
                            <p><a href="tel:02177201052" class="hover:underline">(021) 77201052</a></p>
                            <p>Senin - Jumat: 07.00 - 17.00</p>
                            <p>Sabtu: 07.00 - 15.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 flex justify-center">
            <img 
                src="{{ asset('images/logo-jhic,dkk.png') }}" 
                alt="Logo Sponsor Jagoan Hosting, Komdigi, Maspion IT, Garuda Spark"
                class="w-full max-w-4xl h-auto object-contain px-6 drop-shadow-md bg-white rounded"
            >
        </div>

        <div class="text-center text-sm text-gray-200 mt-8 border-t border-gray-300 pt-4">
            © 2025 Citra Negara. All rights reserved.
        </div>
    </div>
</footer>
