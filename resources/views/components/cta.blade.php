<section class="pt-20 flex flex-col items-center justify-end text-center" data-aos="zoom-in" data-aos-duration="1000" id="kontak">      
    <div class="px-6 w-full">
        <h2 class="text-3xl md:text-4xl font-extrabold text-primary mb-2">Kami selalu terbuka untukmu</h2>
        <p class="text-base md:text-lg text-gray-600 mb-10">Yuk, mulai langkah menuju masa depan cerah bersama sekolah mantap</p>
        <div class="mt-6 flex flex-wrap justify-center gap-4">
            <a href="/kontak" class="px-6 py-3 bg-primary rounded-full font-semibold text-white hover:bg-primary-600 transition-all shadow-lg shadow-primary/30">Hubungi Kami</a>
            <a href="/spmb" class="px-6 py-3 bg-white text-primary border border-primary rounded-full font-semibold hover:bg-primary-50 transition-all shadow-lg mb-2">Daftar SPMB</a>
        </div>
    </div>

    <!-- Container gambar dibuat nempel ke bagian bawah (end) tanpa sisa margin -->
    <div class="mt-10 w-full flex justify-center items-end leading-none" style="margin-bottom: -1px;">
        <img src="/images/Desain tanpa judul 1.png" alt="Citra Negara" class="max-w-full h-auto block">
    </div>
</section>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            new Swiper('.swiper', {
            slidesPerView: 1,
            spaceBetween: 16,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 3000, // jeda 3 detik
                disableOnInteraction: false, // tetap jalan meski user swipe manual
            },
            loop: true, // biar muter terus
            });
        });
    </script>