<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="SMK Citra Negara - Sekolah unggulan yang membentuk generasi terampil, disiplin, dan siap kerja.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="SMK Citra Negara, Sekolah Kejuruan, SMK di Depok, Pendidikan Vokasi">
    <meta name="author" content="SMK Citra Negara">
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <title>SMK Citra Negara</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
            scroll-margin-top: 4rem;
        }
    </style>

</head>
<body class="antialiased text-gray-900">
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

    <noscript>
        <style>[data-aos]{opacity:1 !important;transform:none !important;}</style>
    </noscript>
</body>
</html>