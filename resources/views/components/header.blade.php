<header
  x-data="{ open:false, scrolled:false, dropdown:null, subDropdown:null }"
  x-init="
    const onScroll = () => scrolled = window.scrollY > 10;
    window.addEventListener('scroll', onScroll);
    onScroll();
  "
  @keydown.escape.window="open = false; dropdown = null; subDropdown = null"
  class="fixed top-0 left-0 w-full z-50 transition-all duration-300 ease-out"
  :class="scrolled ? 'bg-white/90 backdrop-blur-md shadow-sm' : 'bg-transparent'"
>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      <!-- Logo -->
      <a href="/" class="flex gap-3 shrink-0">
        <img src="{{ asset('images/logo-cn.png') }}" alt="Citra Negara"
          class="w-11 h-11 object-contain transition-transform duration-300 hover:scale-105" />
        <div class="hidden sm:flex flex-col leading-tight">
          <span class="font-extrabold text-primary text-sm lg:text-base">Citra Negara</span>
          <span class="text-xs text-gray-600">SMP · SMK · SMA Citra Negara</span>
        </div>
      </a>

      <div class="flex items-center gap-10">
        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-gray-800">

          <!-- Tentang Kami -->
          <div class="relative" @mouseenter="dropdown = 'tentang'" @mouseleave="dropdown = null">
            <button class="hover:text-primary transition-colors duration-300 flex items-center gap-1">
              Tentang Kami
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div
              x-show="dropdown === 'tentang'"
              x-transition
              class="absolute left-0 mt-2 w-48 bg-white border border-gray-100 rounded-xl shadow-md py-2 z-40">
              <a href="{{ url('/#sejarah') }}" class="block px-4 py-2.5 hover:bg-gray-50 hover:text-primary">Sejarah</a>
              <a href="{{ url('/#yayasan') }}" class="block px-4 py-2.5 hover:bg-gray-50 hover:text-primary">Yayasan</a>
              <a href="{{ url('/#visi-misi') }}" class="block px-4 py-2.5 hover:bg-gray-50 hover:text-primary">Visi & Misi</a>
            </div>
          </div>

          <!-- Sekolah -->
          <div class="relative" @mouseenter="dropdown = 'sekolah'" @mouseleave="dropdown = null">
            <button class="hover:text-primary transition-colors duration-300 flex items-center gap-1">
              Sekolah
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <!-- Dropdown level 1: SMP / SMK / SMA -->
            <div
              x-show="dropdown === 'sekolah'"
              x-transition
              class="absolute left-0 mt-2 w-56 bg-white border border-gray-100 rounded-xl shadow-md py-2 z-50"
            >
              <!-- SMP -->
              <div class="relative group" @mouseenter="subDropdown = 'smp'" @mouseleave="subDropdown = null">
                <a href="/smp" class="flex justify-between items-center px-4 py-2.5 hover:bg-gray-50 hover:text-primary">
                  SMP Citra Negara
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gray-400 group-hover:text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>

                <!-- Submenu SMP -->
                <div
                  x-show="subDropdown === 'smp'"
                  x-transition
                  class="absolute top-0 left-full ml-1 w-44 bg-white border border-gray-100 rounded-xl shadow-md py-2"
                >
                  <a href="/smp" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Beranda</a>
                  <a href="/smp/spmb" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">SPMB</a>
                </div>
              </div>

              <!-- SMK -->
              <div class="relative group" @mouseenter="subDropdown = 'smk'" @mouseleave="subDropdown = null">
                <a href="/smk" class="flex justify-between items-center px-4 py-2.5 hover:bg-gray-50 hover:text-primary">
                  SMK Citra Negara
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gray-400 group-hover:text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>

                <!-- Submenu SMK -->
                <div
                  x-show="subDropdown === 'smk'"
                  x-transition
                  class="absolute top-0 left-full ml-1 w-44 bg-white border border-gray-100 rounded-xl shadow-md py-2"
                >
                  <a href="/smk" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Beranda</a>
                  <a href="{{ url('/smk/#jurusan') }}" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Jurusan</a>
                  <a href="/smk/spmb" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">SPMB</a>
                </div>
              </div>

              <!-- SMA -->
              <div class="relative group" @mouseenter="subDropdown = 'sma'" @mouseleave="subDropdown = null">
                <a href="/sma" class="flex justify-between items-center px-4 py-2.5 hover:bg-gray-50 hover:text-primary">
                  SMA Citra Negara
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gray-400 group-hover:text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>

                <!-- Submenu SMA -->
                <div
                  x-show="subDropdown === 'sma'"
                  x-transition
                  class="absolute top-0 left-full ml-1 w-44 bg-white border border-gray-100 rounded-xl shadow-md py-2"
                >
                  <a href="/sma" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Beranda</a>
                   <a href="{{ url('/sma/#jurusan') }}" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Jurusan</a>
                  <a href="/sma/spmb" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">SPMB</a>
                </div>
              </div>
            </div>
          </div>

          <a href="/berita" class="hover:text-primary transition-colors duration-300">Berita</a>
          <a href="/kontak" class="hover:text-primary transition-colors duration-300">Kontak</a>
        </nav>

        <!-- Tombol Daftar -->
        <a href="/spmb"
          class="hidden md:inline-block bg-primary text-white font-semibold px-6 py-2.5 rounded-full 
          shadow-md hover:shadow-lg hover:bg-[#7FBF1D] active:scale-95 transition-all duration-300 text-sm">
          DAFTAR SPMB
        </a>

        <!-- Mobile Button -->
        <button
          @click="open = !open"
          aria-label="Toggle menu"
          :aria-expanded="open.toString()"
          class="md:hidden p-2 rounded-md bg-white/30 hover:bg-white/40 transition"
        >
          <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div
    x-show="open"
    x-cloak
    x-transition
    class="md:hidden bg-white/95 backdrop-blur-sm shadow-lg border-t border-gray-100 px-6 py-5"
  >
    <nav class="flex flex-col gap-2 text-gray-800 font-medium">
      <!-- Tentang Kami -->
      <div x-data="{ openTentang:false }">
        <button @click="openTentang = !openTentang" class="flex justify-between w-full py-2">
          Tentang Kami
          <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-180': openTentang }" class="w-4 h-4 mt-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div x-show="openTentang" x-collapse class="pl-4 flex flex-col">
          <a href="{{ url('/#sejarah') }}" class="py-1.5">Sejarah</a>
          <a href="{{ url('/#yayasan') }}" class="py-1.5">Yayasan</a>
          <a href="{{ url('/#visi-misi') }}" class="py-1.5">Visi & Misi</a>
        </div>
      </div>

      <!-- Sekolah -->
      <div x-data="{ openSchool:false, openSMP:false, openSMK:false, openSMA:false }">
        <button @click="openSchool = !openSchool" class="flex justify-between w-full py-2">
          Sekolah
          <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-180': openSchool }" class="w-4 h-4 mt-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>

        <div x-show="openSchool" x-collapse class="pl-4 flex flex-col">
          <!-- SMP -->
          <div>
            <button @click="openSMP = !openSMP" class="flex justify-between w-full py-1.5">
              SMP Citra Negara
              <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-180': openSMP }" class="w-3.5 h-3.5 mt-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div x-show="openSMP" x-collapse class="pl-4 flex flex-col">
              <a href="/smp" class="py-1">Beranda</a>
              <a href="/smp/spmb" class="py-1">SPMB</a>
            </div>
          </div>

          <!-- SMK -->
          <div>
            <button @click="openSMK = !openSMK" class="flex justify-between w-full py-1.5">
              SMK Citra Negara
              <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-180': openSMK }" class="w-3.5 h-3.5 mt-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div x-show="openSMK" x-collapse class="pl-4 flex flex-col">
              <a href="/smk" class="py-1">Beranda</a>
              <a href="{{ url('/smk/#jurusan') }}" class="py-1">Jurusan</a>
              <a href="/smk/spmb" class="py-1">SPMB</a>
            </div>
          </div>

          <!-- SMA -->
          <div>
            <button @click="openSMA = !openSMA" class="flex justify-between w-full py-1.5">
              SMA Citra Negara
              <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-180': openSMA }" class="w-3.5 h-3.5 mt-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div x-show="openSMA" x-collapse class="pl-4 flex flex-col">
              <a href="/sma" class="py-1">Beranda</a>
              <a href="{{ url('/sma/#jurusan') }}" class="py-1">Jurusan</a>
              <a href="/sma/spmb" class="py-1">SPMB</a>
            </div>
          </div>
        </div>
      </div>

      <a href="/berita" class="py-2">Berita</a>
      <a href="/kontak" class="py-2">Kontak</a>

      <a href="/spmb"
        class="mt-3 text-center bg-primary text-white font-semibold px-5 py-2 rounded-full shadow-md hover:bg-[#7FBF1D] hover:shadow-lg transition-all duration-300">
        DAFTAR SPMB
      </a>
    </nav>
  </div>
</header>
