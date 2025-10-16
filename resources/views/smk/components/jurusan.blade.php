<section class="py-20 min-h-[600px] px-6 bg-gradient-to-b from-white via-green-50 to-white" id="jurusan">
  <div class="max-w-7xl mx-auto text-center">
    <h3 class="text-3xl md:text-5xl font-extrabold text-gray-800 mb-4 leading-tight" data-aos="fade-down">
      Temukan <span class="text-[#7CB518]">Jurusan Unggulan</span>  
      <br class="hidden md:block" /> 
      di <span class="text-gray-800">SMK Citra Negara</span>
    </h3>
    <p class="text-gray-600 max-w-3xl mx-auto mb-16 text-base md:text-lg" data-aos="fade-up" data-aos-delay="150">
      Enam jurusan pilihan dengan kurikulum terkini yang disiapkan untuk mencetak generasi profesional, kreatif, 
      dan siap menghadapi tantangan dunia kerja maupun dunia usaha.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
     @php
  $jurusan = [
    ['nama'=>'MPLB','warna'=>'from-[#E8B931] to-yellow-100','img'=>'/images/smk/m-mplb.png','desk'=>'Mengembangkan kemampuan administrasi, komunikasi bisnis, dan layanan perkantoran digital.','text'=>'text-yellow-700','border'=>'border-[#FFD600]', 'link'=>'mplb', 'comingsoon'=>false],
    ['nama'=>'DKV','warna'=>'from-[#900B09] to-pink-300','img'=>'/images/smk/m-dkv.png','desk'=>'Belajar desain visual, ilustrasi, fotografi, hingga branding digital kreatif.','text'=>'text-white','border'=>'border-[#FF6B6B]', 'link'=>'dkv', 'comingsoon'=>false],
    ['nama'=>'PPLG','warna'=>'from-[#14104E] to-blue-300','img'=>'/images/smk/m-pplg.png','desk'=>'Menciptakan perangkat lunak, website, dan game dengan teknologi modern.','text'=>'text-white','border'=>'border-[#7B6CF6]', 'link'=>'pplg', 'comingsoon'=>false],
    ['nama'=>'TJKT','warna'=>'from-blue-400 to-blue-100','img'=>'/images/smk//m-tkj.png','desk'=>'Menguasai jaringan komputer, sistem server, dan infrastruktur IT profesional.','text'=>'text-blue-900','border'=>'border-[#6EC6FF]', 'link'=>'tjkt', 'comingsoon'=>false],
    ['nama'=>'PM','warna'=>'from-[#FFB84C] to-[#FFD580]','img'=>'/images/smk/m-pm.png','desk'=>'Belajar strategi pemasaran digital, wirausaha, dan layanan pelanggan.','text'=>'text-[#E26A00]','border'=>'border-[#E26A00]', 'link'=>'pm', 'comingsoon'=>false],
    ['nama'=>'PH','warna'=>'from-green-200 to-gray-100','img'=>'/images/smk//m-ph.png','desk'=>'Mengasah keahlian di bidang perhotelan, pelayanan tamu, dan tata boga.','text'=>'text-green-800','border'=>'border-green-700', 'link'=>'ph', 'comingsoon'=>true]
  ];
@endphp

@foreach ($jurusan as $index => $j)
  <div
    class="relative group rounded-2xl bg-gradient-to-br {{ $j['warna'] }} p-8 flex flex-col items-center shadow-xl transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:scale-[1.03]"
    data-aos="fade-up"
    data-aos-delay="{{ 100 + ($index * 100) }}">
    
    <!-- Glow effect -->
    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 bg-white/10 rounded-2xl blur-lg"></div>
    
    <!-- Gambar jurusan -->
    <div class="relative z-10 w-40 h-40 mb-6 flex items-center justify-center">
      <img 
        src="{{ $j['img'] }}" 
        alt="{{ $j['nama'] }}" 
        loading="lazy" decoding="async"
        class="max-w-full max-h-full object-contain transition-transform duration-500 group-hover:scale-110 drop-shadow-lg"
      />
    </div>

    <h4 class="relative z-10 font-extrabold text-xl {{ $j['text'] }} mb-2">{{ $j['nama'] }}</h4>
    <p class="relative z-10 text-sm md:text-base text-center text-black/80 mb-4">{{ $j['desk'] }}</p>
    
    @if ($j['comingsoon'])
      <span class="relative z-10 inline-flex items-center px-5 py-2 bg-gray-400/70 border border-gray-300 text-sm font-semibold rounded-full text-white cursor-not-allowed">
        Coming Soon
      </span>
    @else
      <a href="{{ url('/smk/jurusan/' . strtolower($j['link'])) }}" 
        class="relative z-10 inline-flex items-center px-5 py-2 bg-white {{ $j['border'] }} border text-sm font-semibold rounded-full transition-all duration-300 hover:text-white hover:bg-[#7CB518]">
        Ketahui lebih lanjut <span class="ml-2">→</span>
      </a>
    @endif
  </div>
@endforeach
  
    </div>
  </div>
</section>