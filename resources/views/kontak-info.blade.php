@extends('layouts.app')

@section('title', 'Hubungi Kami - Citra Negara')
@section('meta_description', 'Hubungi Citra Negara untuk informasi lebih lanjut. Alamat: Jl. Raya Tanah Baru No.99 Kemiri Jaya, Depok. Telepon: (021) 77201052. Email: info@citranegara.sch.id')

@section('content')
<div class="min-h-[calc(100vh-80px)] bg-white flex flex-col justify-center py-12 px-6 overflow-hidden relative">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 opacity-[0.03] bg-[url('/images/pattern-light.svg')] bg-repeat pointer-events-none"></div>
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary/10 rounded-full blur-[120px] -translate-y-1/2 pointer-events-none"></div>
    
    <div class="max-w-7xl mx-auto w-full relative z-10">
        <!-- Compact Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-primary/10 rounded-full mb-4 border border-primary/20">
                <div class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></div>
                <span class="text-[9px] font-black uppercase tracking-widest text-primary">Get In Touch</span>
            </div>
            <h1 class="text-3xl md:text-5xl font-black text-gray-900 tracking-tight">
                Sudah siap jadi bagian <span class="text-primary">Citra Negara?</span>
            </h1>
        </div>

        <div class="grid lg:grid-cols-12 gap-8 items-stretch">
            <!-- Left Side: Information Cards -->
            <div class="lg:col-span-5 flex flex-col gap-6" data-aos="fade-right">
                <!-- Location -->
                <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 group hover:border-primary/30 transition-all duration-500">
                    <div class="flex items-start gap-5">
                        <div class="w-12 h-12 shrink-0 rounded-2xl bg-gray-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-500">
                            <i class="fa-solid fa-location-dot text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-gray-900 mb-1 tracking-tight">Lokasi</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-3">
                                Jl. Tanah Baru Jl. Kemiri Jaya No.99, Beji, <br>
                                Kota Depok, Jawa Barat 16421
                            </p>
                            <a href="https://maps.app.goo.gl/smkcitranegara" target="_blank" class="inline-flex items-center gap-2 text-primary font-black text-[10px] uppercase tracking-widest group/link">
                                Petunjuk Arah 
                                <i class="fa-solid fa-arrow-right transition-transform group-hover/link:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Info Grid -->
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 group hover:border-primary/30 transition-all">
                        <div class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all mb-4">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <h4 class="text-sm font-black text-gray-900 mb-1">Email</h4>
                        <a href="mailto:info@citranegara.sch.id" class="text-gray-500 text-xs truncate block hover:text-primary transition-colors">info@citranegara.sch.id</a>
                    </div>
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 group hover:border-primary/30 transition-all">
                        <div class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all mb-4">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <h4 class="text-sm font-black text-gray-900 mb-1">Telepon</h4>
                        <a href="tel:02177201052" class="text-gray-500 text-xs hover:text-primary transition-colors block font-bold tracking-tight">(021) 77201052</a>
                    </div>
                </div>

                <!-- WhatsApp Card -->
                <div class="bg-[#25D366]/5 p-6 rounded-[2rem] border border-[#25D366]/20 group hover:bg-[#25D366] transition-all duration-500 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-white flex items-center justify-center text-[#25D366] shadow-sm">
                            <i class="fa-brands fa-whatsapp text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-black text-gray-900 group-hover:text-white transition-colors tracking-tight">Chat WhatsApp</h3>
                            <p class="text-[#25D366] text-[10px] font-bold group-hover:text-white/80 transition-colors uppercase tracking-widest">Konsultasi PPDB</p>
                        </div>
                    </div>
                    <a href="https://wa.me/6281325269477" target="_blank" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-gray-900 hover:scale-110 transition-all shadow-sm">
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Right Side: Map & Hours -->
            <div class="lg:col-span-7 flex flex-col gap-6" data-aos="fade-left">
                <div class="flex-1 relative rounded-[2.5rem] overflow-hidden border border-gray-100 shadow-sm min-h-[350px]">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3768.914770058075!2d106.808656!3d-6.380465!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eeacc6e549ab%3A0xd6c5c8ece644d8ee!2sSMK%20Citra%20Negara!5e1!3m2!1sen!2sus!4v1760335323522!5m2!1sen!2sus"
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        class="absolute inset-0"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <!-- Hours Card -->
                <div class="bg-gray-900 p-6 rounded-[2rem] text-white flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-secondary">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div>
                            <h4 class="font-black text-sm tracking-tight">Jam Operasional</h4>
                            <p class="text-white/50 text-[9px] uppercase tracking-widest font-bold">Resepsionis & Administrasi</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="text-center md:text-left">
                            <p class="text-[8px] text-white/40 font-bold uppercase tracking-widest mb-0.5">Senin - Jumat</p>
                            <p class="text-xs font-black">07:00 – 17:00</p>
                        </div>
                        <div class="w-[1px] h-8 bg-white/10 hidden md:block"></div>
                        <div class="text-center md:text-left">
                            <p class="text-[8px] text-white/40 font-bold uppercase tracking-widest mb-0.5">Sabtu</p>
                            <p class="text-xs font-black">07:00 – 15:00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Bar -->
        <div class="mt-12 flex justify-center">
            <a href="/" class="group flex items-center gap-3 px-8 py-4 bg-gray-50 hover:bg-gray-100 text-gray-900 font-black rounded-full transition-all duration-300">
                <i class="fa-solid fa-house text-sm text-primary group-hover:rotate-12 transition-transform"></i>
                KEMBALI KE BERANDA
            </a>
        </div>
    </div>
</div>
@endsection