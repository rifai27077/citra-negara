@extends('layouts.app')

@section('title', 'Pendaftaran Siswa Baru (PPDB) - Citra Negara')
@section('meta_description', 'Formulir pendaftaran siswa baru (PPDB) untuk SMK, SMA, dan SMP Citra Negara tahun ajaran 2026/2027. Daftar sekarang dan bergabung dengan sekolah unggulan di Depok.')
@section('meta_keywords', 'PPDB Citra Negara, Pendaftaran Siswa Baru, PPDB SMK Depok, PPDB SMA Depok, PPDB SMP Depok, Daftar Sekolah Depok, Formulir Pendaftaran')

@section('content')
<section class="py-16 bg-white">
  <div class="max-w-5xl mx-auto px-4">
    <h2 class="text-2xl md:text-3xl font-extrabold text-black">Seleksi Penerimaan Murid Baru (SPMB)</h2>
    <p class="text-gray-600 font-medium mt-1 mb-8">Citra Negara</p>

    {{-- Pengumuman --}}
    <div class="bg-[#7CB518] text-white rounded-2xl p-6 mb-10 shadow-md">
      <h3 class="text-xl font-bold mb-2">📢 Pengumuman Penting</h3>
      <p>Pendaftaran untuk tahun ajaran <span class="font-semibold">2026/2027</span> telah dibuka! Silakan isi formulir di bawah ini dengan lengkap dan benar.</p>
    </div>

    {{-- Cek Daftar Harga --}}
    <div class="bg-[#7CB518] text-white rounded-2xl p-6 mb-10 shadow-md">
      <h3 class="text-xl font-bold mb-2">📋 Cek Daftar Harga Disini</h3>
      <p>Bisa cek daftar harga sebelum mengisi formulir pendaftaran disini!</p>
      <div>
        <a href="/daftar-harga" class="inline-block bg-white text-[#7CB518] mt-5 font-semibold px-8 py-3 rounded-full shadow-lg hover:bg-gray-100 transition-all duration-300">
          Lihat Daftar Harga
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
            <select name="jenis_kelamin" class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#7CB518]" required>
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

      {{-- Unit Pendidikan --}}
      <div>
        <h4 class="text-lg font-bold text-[#7CB518] mb-3">Unit Pendidikan</h4>
        <select id="unitPendidikan" name="unit_pendidikan" class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#7CB518]" required>
          <option value="">-- Pilih Unit Pendidikan --</option>
          <option value="SMP">SMP</option>
          <option value="SMA">SMA</option>
          <option value="SMK">SMK</option>
        </select>
      </div>

      {{-- Dropdown Tambahan Dinamis --}}
      <div id="opsiTambahan" class="hidden"></div>

      {{-- Tombol --}}
      <div class="text-center mt-8">
        <button type="submit" id="submitButton" class="px-10 py-3 bg-[#7CB518] hover:bg-[#6aa212] text-white font-semibold rounded-full shadow transition duration-200">
          Kirim Pendaftaran
        </button>

        <div class="mt-6"> {{-- kasih jarak antara dua tombol --}}
          <a href="/" class="px-6 py-3 bg-white border-2 border-[#7CB518] text-[#7CB518] font-semibold rounded-full shadow hover:bg-[#7CB518] hover:text-white transition-all duration-300">
            ← Kembali ke Beranda
          </a>
        </div>
      </div>
    </form>
  </div>

  {{-- Popup Sukses --}}
  <div id="successPopup" class="fixed inset-0 flex items-center justify-center bg-black/50 hidden z-50">
    <div class="bg-white rounded-2xl shadow-xl p-8 text-center max-w-sm mx-auto">
      <h2 class="text-2xl font-bold text-[#7CB518] mb-3">Pendaftaran Berhasil 🎉</h2>
      <p class="text-gray-700 mb-6">Terima kasih telah mengisi formulir PPDB.<br>Kami akan segera memproses data kamu!</p>
      <button id="closePopup" class="px-6 py-2 bg-[#7CB518] hover:bg-[#6aa212] text-white font-semibold rounded-full transition">Tutup</button>
    </div>
  </div>
</section>

{{-- Script Dinamis --}}
<script>
  const unitSelect = document.getElementById('unitPendidikan');
  const opsiTambahan = document.getElementById('opsiTambahan');

  unitSelect.addEventListener('change', function () {
    const value = this.value;
    opsiTambahan.innerHTML = '';
    opsiTambahan.classList.add('hidden');

    if (value === 'SMP') {
      opsiTambahan.classList.remove('hidden');
      opsiTambahan.innerHTML = `
        <label class="block text-lg font-bold text-[#7CB518] mb-3">Pilih Kelas</label>
        <select name="kelas_smp" class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#7CB518]" required>
          <option value="">-- Pilih Kelas --</option>
          <option value="Reguler">Kelas Reguler</option>
          <option value="Plus">Kelas Plus</option>
        </select>
      `;
    } else if (value === 'SMK') {
      opsiTambahan.classList.remove('hidden');
      opsiTambahan.innerHTML = `
        <label class="block text-lg font-bold text-[#7CB518] mb-3">Pilih Jurusan</label>
        <select name="jurusan_smk" class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#7CB518]" required>
          <option value="">-- Pilih Jurusan --</option>
          <option value="PPLG">PPLG (Pengembangan Perangkat Lunak & Gim)</option>
          <option value="PPLG">PPLG PLUS(Pengembangan Perangkat Lunak & Gim)</option>
          <option value="TJKT">TJKT (Teknik Jaringan Komputer & Telekomunikasi)</option>
          <option value="TJKT">TJKT PLUS (Teknik Jaringan Komputer & Telekomunikasi)</option>
          <option value="DKV">DKV (Desain Komunikasi Visual)</option>
          <option value="DKV">DKV PLUS(Desain Komunikasi Visual)</option>
          <option value="MPLB">MPLB (Manajemen Perkantoran & Layanan Bisnis)</option>
          <option value="MPLB">MPLB PLUS (Manajemen Perkantoran & Layanan Bisnis)</option>
          <option value="PM">PM (Pemasaran)</option>
          <option value="PH">PH (Perhotelan)</option>
        </select>
      `;
    }
  });

  // Popup sukses
  document.querySelector("form").addEventListener("submit", function(event) {
    event.preventDefault();
    document.getElementById("successPopup").classList.remove("hidden");
    this.reset();
    opsiTambahan.innerHTML = '';
    opsiTambahan.classList.add('hidden');
  });

  document.getElementById("closePopup").addEventListener("click", function() {
    document.getElementById("successPopup").classList.add("hidden");
  });
</script>
@endsection
