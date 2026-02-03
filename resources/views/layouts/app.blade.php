<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    {{-- Primary Meta Tags --}}
    <title>@yield('title', 'Citra Negara - Sekolah Unggulan SMK, SMA, SMP di Depok')</title>
    <meta name="title" content="@yield('meta_title', 'Citra Negara - Sekolah Unggulan SMK, SMA, SMP di Depok')">
    <meta name="description" content="@yield('meta_description', 'Yayasan At-Taqwa Kemiri Jaya - Citra Negara menaungi SMK, SMA, dan SMP unggulan di Depok. Membentuk generasi terampil, disiplin, dan siap kerja dengan visi MANTAP.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Citra Negara, SMK Citra Negara, SMA Citra Negara, SMP Citra Negara, Sekolah di Depok, SMK di Depok, SMA di Depok, SMP di Depok, Pendidikan Vokasi, TJKT, PPLG, DKV, Perhotelan, PPDB Depok, Sekolah Kejuruan Depok')">
    <meta name="author" content="Yayasan At-Taqwa Kemiri Jaya - Citra Negara">
    <meta name="robots" content="index, follow">
    
    {{-- Canonical URL --}}
    <link rel="canonical" href="@yield('canonical', url()->current())">
    
    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:title" content="@yield('og_title', 'Citra Negara - Sekolah Unggulan SMK, SMA, SMP di Depok')">
    <meta property="og:description" content="@yield('og_description', 'Yayasan At-Taqwa Kemiri Jaya - Citra Negara menaungi SMK, SMA, dan SMP unggulan di Depok. Membentuk generasi terampil, disiplin, dan siap kerja.')">
    <meta property="og:image" content="@yield('og_image', asset('images/logo-cn.png'))">
    <meta property="og:site_name" content="Citra Negara">
    <meta property="og:locale" content="id_ID">
    
    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="@yield('twitter_url', url()->current())">
    <meta name="twitter:title" content="@yield('twitter_title', 'Citra Negara - Sekolah Unggulan SMK, SMA, SMP di Depok')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Yayasan At-Taqwa Kemiri Jaya - Citra Negara menaungi SMK, SMA, dan SMP unggulan di Depok.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/logo-cn.png'))">
    
    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              "primary": {
                DEFAULT: "#699D15",
                50: '#f1f8e6',
                100: '#e0efc8',
                200: '#c5e297',
                300: '#a3cf60',
                400: '#84bc34',
                500: '#699d15',
                600: '#527e0f',
                700: '#406111',
                800: '#354d13',
                900: '#2d4114',
                950: '#172406',
              },
              "secondary": {
                DEFAULT: "#E9DC00",
                50: '#fefce7',
                100: '#fdf8c3',
                200: '#fcf18d',
                300: '#fae64e',
                400: '#f9d81d',
                500: '#e9dc00',
                600: '#cbb300',
                700: '#a28303',
                800: '#86680a',
                900: '#72550f',
                950: '#422e04',
              },
              "accent": {
                  DEFAULT: "#C3E956",
                  50: '#f7fceb',
                  100: '#ebf9ce',
                  200: '#d8f1a0',
                  300: '#c3e956',
                  400: '#a9db2b',
                  500: '#89bf15',
                  600: '#69980d',
                  700: '#50750e',
                  800: '#415d12',
                  900: '#384f15',
                  950: '#1c2b05',
              },
            },
            fontFamily: {
              sans: ['Inter', 'sans-serif'],
              display: ['Outfit', 'sans-serif'],
            },
            boxShadow: {
              'soft': '0 4px 20px -2px rgba(0, 0, 0, 0.05)',
              'glow': '0 0 15px rgba(105, 157, 21, 0.3)',
            }
          }
        }
      }
    </script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <link rel="preload" href="/fonts/inter.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        html, body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
            }

        * { box-sizing: border-box; }

       
        [x-cloak] { display: none !important; }

        section {
            scroll-margin-top: 4rem; /* Sesuaikan dengan tinggi header (biasanya 4rem–6rem) */
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(105,157,21, 0.6); }
            50% { transform: scale(1.05); box-shadow: 0 0 0 12px rgba(105,157,21, 0); }
        }
        #chat-robibtn {
            animation: pulse 2.5s infinite;
        }

        @media (max-width: 640px) {
            #chat-robibtn-wrapper {
                right: 1rem;
                bottom: 1rem;
            }
            #robi-tooltip {
                font-size: 0.75rem;
                padding: 0.25rem 0.5rem;
            }
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-50 text-gray-800 overflow-x-hidden antialiased">
    <x-header class="site-header sticky top-0 z-50 bg-white shadow-sm h-16 md:h-20" />

    <main class="flex-1 pt-16 md:pt-20">
        @yield('content')
    </main>
    
    <x-chatrobi />
    <x-footer class="mt-auto" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
    const isDesktop = window.matchMedia("(min-width: 768px)").matches;

    if (isDesktop) {
        // Buat elemen script untuk load AOS hanya di desktop
        const aosScript = document.createElement("script");
        aosScript.src = "https://unpkg.com/aos@2.3.4/dist/aos.js";
        aosScript.onload = function() {
        AOS.init({
            once: true,
            duration: 700,
            delay: 100,
            offset: 80,
            easing: "ease-out-cubic",
        });
        };
        document.body.appendChild(aosScript);

        // Tambahkan stylesheet AOS juga
        const aosStyle = document.createElement("link");
        aosStyle.rel = "stylesheet";
        aosStyle.href = "https://unpkg.com/aos@2.3.4/dist/aos.css";
        document.head.appendChild(aosStyle);
    } else {
        // Nonaktifkan efek AOS di mobile
        document.querySelectorAll("[data-aos]").forEach(el => {
        el.removeAttribute("data-aos");
        el.removeAttribute("data-aos-delay");
        el.removeAttribute("data-aos-duration");
        el.removeAttribute("data-aos-offset");
        });
    }
    });
    </script>


    @stack('scripts')
</body>
</html>
