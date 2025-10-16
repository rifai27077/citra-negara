@extends('layouts.app')

@section('content')
<section class="py-16 bg-white">
  <div class="max-w-5xl mx-auto px-4">
    <h2 class="text-2xl md:text-3xl font-extrabold text-black">Seleksi Penerimaan Murid Baru (SPMB)</h2>
    <p class="text-gray-600 font-medium mt-1 mb-8">SMA Citra Negara</p>

    {{-- Informasi Umum --}}
    <div class="bg-[#7CB518] text-white rounded-2xl p-6 mb-10 shadow-md">
      <h3 class="text-xl font-bold mb-2">📢 Pengumuman Penting</h3>
      <p class="text-white leading-relaxed">
        Pendaftaran untuk tahun ajaran <span class="font-semibold text-white">2026/2027</span> telah dibuka!
        Silakan isi formulir di bawah ini dengan lengkap dan benar.
      </p>
    </div>

     <div class="bg-[#7CB518] text-white rounded-2xl p-6 mb-10 shadow-md">
      <h3 class="text-xl font-bold mb-2">📋 Cek Daftar Harga Disini</h3>
      <p class="text-white leading-relaxed">
        Bisa cek daftar harga sebelum mengisi formulir pendaftaran disni !
      </p>
        <div>
            <a href="/smp/daftar-harga" class="inline-block bg-white text-[#7CB518] mt-5 font-semibold px-8 py-3 rounded-full shadow-lg hover:bg-gray-100 transition-all duration-300">Lihat Daftar Harga
            </a>
        </div>
    </div>

    {{-- Formulir PPDB --}}
    <form action="{{ route('ppdb.store') }}" method="POST" class="space-y-6 bg-gray-50 p-8 rounded-2xl shadow-md border border-gray-200">
      @csrf

      {{-- Data Diri --}}
      <div>
        <h4 class="text-lg font-bold text-[#7CB518] mb-3">Data Diri Calon Siswa</h4>
        <div class="grid md:grid-cols-2 gap-4">
          <div>
            <label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
            <input type="text" name="nama" class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#7CB518]" required>
          </div>

          <div>
            <label class="block text-gray-700 font-medium mb-2">NISN</label>
            <input type="text" name="nisn" class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#7CB518]" required>
          </div>

          <div>
            <label class="block text-gray-700 font-medium mb-2">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#7CB518]" required>
          </div>

          <div>
            <label class="block text-gray-700 font-medium mb-2">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#7CB518]" required>
          </div>

          <div>
            <label class="block text-gray-700 font-medium mb-2">Jenis Kelamin</label>
            <select name="jurusan" class="appearance-none w-full border border-gray-300 rounded-full px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-[#7CB518] bg-white" style="background-image: linear-gradient(45deg, transparent 50%, #000000ff 50%), linear-gradient(135deg, #000000ff 50%, transparent 50%); background-position: calc(100% - 20px) calc(1em + 2px), calc(100% - 15px) calc(1em + 2px); background-size: 5px 5px, 5px 5px; background-repeat: no-repeat;" required>
              <option value="">-- Pilih --</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>

          <div>
            <label class="block text-gray-700 font-medium mb-2">Alamat Lengkap</label>
            <input type="text" name="alamat" class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#7CB518]" required>
          </div>
        </div>
      </div>

      {{-- Data Sekolah Asal --}}
      <div>
        <h4 class="text-lg font-bold text-[#7CB518] mb-3">Data Sekolah Asal</h4>
        <div class="grid md:grid-cols-2 gap-4">
          <div>
            <label class="block text-gray-700 font-medium mb-2">Nama Sekolah</label>
            <input type="text" name="sekolah_asal" class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#7CB518]" required>
          </div>
          <div>
            <label class="block text-gray-700 font-medium mb-2">Alamat Sekolah</label>
            <input type="text" name="alamat_sekolah" class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#7CB518]" required>
          </div>
        </div>
      </div>

      {{-- Pilihan Jurusan --}}
      <div>
        <h4 class="text-lg font-bold text-[#7CB518] mb-3">Pilihan Jurusan</h4>
        <select name="jurusan" class="appearance-none w-full border border-gray-300 rounded-full px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-[#7CB518] bg-white" style="background-image: linear-gradient(45deg, transparent 50%, #000000ff 50%), linear-gradient(135deg, #000000ff 50%, transparent 50%);
         background-position: calc(100% - 20px) calc(1em + 2px), calc(100% - 15px) calc(1em + 2px);
         background-size: 5px 5px, 5px 5px;
         background-repeat: no-repeat;" required>
          <option value="">-- Pilih Kelas --</option>
          <option value="PPLG">Kelas Reguler</option>
          <option value="TJKT">Kelas Plus</option>
        </select>
      </div>

      {{-- Tombol Submit --}}
        <div class="text-center mt-8 space-y-4">
        <button 
            type="submit" 
            class="px-10 py-3 bg-[#7CB518] hover:bg-[#6aa212] text-white font-semibold rounded-full shadow transition duration-200"
            id="submitButton"
        >
            Kirim Pendaftaran
        </button>
        </div>

        <div class="text-center mt-4">
          <a href="/sma" 
            class="px-8 py-3 bg-white border-2 border-[#7CB518] text-[#7CB518] font-semibold rounded-full shadow hover:bg-[#7CB518] hover:text-white transition-all duration-300">
            ← Kembali ke Beranda
          </a>
        </div>
    </form>
  </div>

  <!-- Popup Success -->
    <div id="successPopup" class="fixed inset-0 flex items-center justify-center bg-black/50 hidden z-50">
        <div class="bg-white rounded-2xl shadow-xl p-8 text-center max-w-sm mx-auto">
            <h2 class="text-2xl font-bold text-[#7CB518] mb-3">Pendaftaran Berhasil 🎉</h2>
            <p class="text-gray-700 mb-6">Terima kasih telah mengisi formulir PPDB.<br>Kami akan segera memproses data kamu!</p>
            <button id="closePopup" class="px-6 py-2 bg-[#7CB518] hover:bg-[#6aa212] text-white font-semibold rounded-full transition">
            Tutup
            </button>
        </div>
    </div>
</section>

    <script>
        document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault(); // supaya nggak reload halaman

        // tampilkan popup
        document.getElementById("successPopup").classList.remove("hidden");

        // reset form biar kosong lagi
        this.reset();
        });

        // tombol untuk menutup popup
        document.getElementById("closePopup").addEventListener("click", function() {
        document.getElementById("successPopup").classList.add("hidden");
        });
    </script>

@endsection