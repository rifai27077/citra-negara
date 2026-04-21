<section class="py-20 min-h-[600px] px-6 bg-white" id="ekstrakurikuler">
  <div class="max-w-7xl mx-auto text-center mb-14">
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-4">
      <span class="text-[#7CB518]">Ekstrakurikuler</span> SMA Citra Negara
    </h2>
  </div>

  @php
    if (!isset($eskuls)) {
        $eskuls = \App\Models\Ekstrakurikuler::where('category', 'SMA')->take(4)->get();
    }
  @endphp

  <div class="max-w-7xl mx-auto flex flex-col gap-14">
    @forelse ($eskuls as $e)
      @php
        $posisi = $loop->iteration % 2 == 0 ? 'right' : 'left';
      @endphp
      <article
        class="flex flex-col md:flex-row items-center bg-white rounded-3xl shadow-lg overflow-hidden transition-transform duration-300 hover:-translate-y-2"
        data-aos="fade-up"
        data-aos-delay="{{ 80 * ($loop->index + 1) }}"
      >
        {{-- Gambar --}}
        <div class="w-full md:w-1/2 {{ $posisi === 'right' ? 'md:order-2' : '' }}">
          <img
            src="{{ asset('storage/' . $e->image) }}"
            alt="{{ $e->name }}"
            class="w-full h-[280px] md:h-[260px] object-cover"
            loading="lazy"
            decoding="async"
            onerror="this.src='/images/placeholder.png'"
          />
        </div>

        {{-- Konten --}}
        <div class="w-full md:w-1/2 px-6 py-8 md:px-10 text-left {{ $posisi === 'right' ? 'md:text-right' : '' }}">
          <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $e->name }}</h3>
          <p class="text-gray-600 mb-6">{!! strip_tags($e->description) !!}</p>

          <div class="flex {{ $posisi === 'right' ? 'md:justify-end' : '' }} gap-4">
            {{-- Detail Button (Assuming there's a show route) --}}
            <a href="{{ route('sma.ekstrakurikuler.show', $e->slug) }}" 
               class="inline-flex items-center justify-center px-6 py-2 rounded-full bg-[#7CB518] text-white font-semibold hover:bg-[#699D15] transition-colors">
              Lihat Detail
            </a>
          </div>
        </div>
      </article>
    @empty
      <div class="py-20 text-center">
        <p class="text-gray-500 italic">Data ekstrakurikuler belum tersedia untuk saat ini.</p>
      </div>
    @endforelse
  </div>

  {{-- Tombol Lihat Semua --}}
  <div class="mt-16 text-center" data-aos="fade-up">
    <a href="{{ route('sma.ekstrakurikuler') }}" 
       class="inline-flex items-center justify-center px-10 py-4 rounded-full bg-white border-2 border-[#7CB518] text-[#7CB518] font-bold text-lg hover:bg-[#7CB518] hover:text-white transition-all duration-300 shadow-md hover:shadow-xl group">
      Lihat Semua Ekstrakurikuler
      <svg class="w-6 h-6 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
      </svg>
    </a>
  </div>

  {{-- skrip modal + keyboard handling --}}
  <script>
    let openIndex = null;

    function openModal(idx) {
      const el = document.getElementById(`modal-${idx}`);
      if (!el) return;
      el.classList.remove('pointer-events-none', 'opacity-0');
      el.classList.add('pointer-events-auto', 'opacity-100');
      // add subtle scale-in
      const panel = el.querySelector('div.relative.max-w-3xl') || el.querySelector('div.relative');
      if (panel) panel.style.transform = 'translateY(0)';
      document.body.classList.add('overflow-hidden');
      openIndex = idx;
      // focus first focusable
      const focusable = el.querySelector('button, a[href], input, select, textarea');
      if (focusable) focusable.focus();
    }

    function closeModal(idx) {
      const el = document.getElementById(`modal-${idx}`);
      if (!el) return;
      el.classList.add('pointer-events-none', 'opacity-0');
      el.classList.remove('pointer-events-auto', 'opacity-100');
      document.body.classList.remove('overflow-hidden');
      openIndex = null;
    }

    // close modal with ESC
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && openIndex !== null) {
        closeModal(openIndex);
      }
    });

    // prevent scroll on mobile when modal open handled by overflow-hidden on body
  </script>
</section>
