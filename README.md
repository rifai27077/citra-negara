# 🏫 Citra Negara School Website

Website resmi **Yayasan At-Taqwa Kemiri Jaya - Citra Negara** yang menaungi SMK, SMA, dan SMP Citra Negara di Depok, Jawa Barat.

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat&logo=laravel)](https://laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4.x-38B2AC?style=flat&logo=tailwind-css)](https://tailwindcss.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php)](https://php.net)

## 📖 Tentang Proyek

Website ini merupakan platform informasi terpadu untuk tiga unit pendidikan di bawah Yayasan At-Taqwa Kemiri Jaya:

- **SMK Citra Negara** - Sekolah Kejuruan dengan 6 jurusan (TJKT, PPLG, DKV, Perhotelan, MPLB, Pemasaran)
- **SMA Citra Negara** - Sekolah Menengah Atas dengan jurusan IPA & IPS
- **SMP Citra Negara** - Sekolah Menengah Pertama dengan program unggulan

**Lokasi:** Jl. Raya Tanah Baru No.99 Kemiri Jaya, Beji, Depok 16421  
**Telepon:** (021) 77213470  
**Website:** [citranegara.sch.id](https://citranegara.sch.id)

## ✨ Fitur Utama

### 🤖 AI Chatbot (Robi)
- Chatbot berbasis AI menggunakan **Groq API** (Llama 3.1)
- Menjawab pertanyaan seputar sekolah, jurusan, PPDB, dan fasilitas
- Rate limiting untuk mencegah spam
- Session-based chat history

### 🎓 Multi-School Landing Pages
- Halaman terpisah untuk SMK, SMA, dan SMP
- Informasi lengkap tentang visi-misi, jurusan, prestasi, dan ekstrakurikuler
- Galeri foto dan video kegiatan sekolah

### 📝 Sistem PPDB (Pendaftaran Siswa Baru)
- Form pendaftaran online terintegrasi
- Informasi biaya dan syarat pendaftaran
- Halaman khusus untuk setiap unit pendidikan

### 📰 Berita & Informasi
- Artikel berita terkini tentang kegiatan sekolah
- Template berita yang konsisten dan responsif

### 📞 Kontak & Informasi
- Halaman kontak dengan informasi lengkap
- Daftar harga dan biaya pendidikan
- Informasi yayasan dan struktur organisasi

### 🎨 UI/UX Modern
- Desain responsif dengan Tailwind CSS 4
- Animasi smooth menggunakan AOS (Animate On Scroll)
- Interaktivitas dengan Alpine.js
- Color scheme konsisten (Primary: #699D15, Secondary: #E9DC00)

## 🛠️ Tech Stack

| Kategori | Teknologi |
|----------|-----------|
| **Backend** | Laravel 12.x (PHP 8.2+) |
| **Frontend** | Blade Templates, Alpine.js |
| **Styling** | Tailwind CSS 4.x |
| **Database** | MySQL |
| **AI/ML** | Groq API (Llama 3.1-8b-instant) |
| **Animations** | AOS (Animate On Scroll) |
| **Icons** | Font Awesome 6.5 |
| **Build Tool** | Vite 7.x |

## 📦 Instalasi & Setup

### Prerequisites

Pastikan sistem Anda sudah terinstall:
- **PHP** >= 8.2
- **Composer** >= 2.x
- **Node.js** >= 18.x & npm
- **MySQL** >= 8.0

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/rifai27077/citra-negara.git
   cd citra-negara
   ```

2. **Install Dependencies**
   ```bash
   # Install PHP dependencies
   composer install

   # Install Node.js dependencies
   npm install
   ```

3. **Environment Configuration**
   ```bash
   # Copy file .env.example ke .env
   cp .env.example .env

   # Generate application key
   php artisan key:generate
   ```

4. **Database Setup**
   
   Edit file `.env` dan sesuaikan konfigurasi database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=web_cn
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   Jalankan migrasi database:
   ```bash
   php artisan migrate
   ```

5. **Groq API Configuration**
   
   Dapatkan API key dari [Groq Console](https://console.groq.com) dan tambahkan ke `.env`:
   ```env
   GROQ_API_KEY=your_groq_api_key_here
   ```

6. **Build Assets**
   ```bash
   npm run build
   ```

7. **Run Development Server**
   ```bash
   # Opsi 1: Jalankan semua service sekaligus (server, queue, vite)
   composer run dev

   # Opsi 2: Jalankan manual
   php artisan serve
   npm run dev
   ```

8. **Akses Website**
   
   Buka browser dan akses: `http://localhost:8000`

## 📁 Struktur Proyek

```
web_cn/
├── app/
│   ├── Http/Controllers/
│   │   ├── ChatbotController.php    # AI Chatbot logic
│   │   ├── AkademikController.php   # Academic info
│   │   └── PpdbController.php       # Student registration
│   └── Models/
│       ├── Faq.php                  # FAQ model
│       └── User.php
├── resources/
│   └── views/
│       ├── components/              # Reusable Blade components
│       │   ├── header.blade.php
│       │   ├── footer.blade.php
│       │   ├── chatrobi.blade.php   # Chatbot UI
│       │   └── ...
│       ├── smk/                     # SMK pages
│       ├── sma/                     # SMA pages
│       ├── smp/                     # SMP pages
│       ├── berita/                  # News pages
│       └── landing.blade.php        # Main landing page
├── routes/
│   └── web.php                      # All web routes
├── public/
│   └── images/                      # Static images
├── database/
│   └── migrations/                  # Database migrations
└── tailwind.config.js               # Tailwind configuration
```

## 🎯 Fitur Utama per Halaman

### Landing Page (`/`)
- Hero section dengan informasi yayasan
- Sejarah dan visi-misi
- Informasi founder dan pengurus
- Unit pendidikan (SMK, SMA, SMP)
- Call-to-action untuk PPDB

### SMK (`/smk`)
- 6 Jurusan: TJKT, PPLG, DKV, Perhotelan, MPLB, Pemasaran
- Informasi prestasi dan ekstrakurikuler
- Daftar harga dan biaya pendidikan
- Form pendaftaran PPDB

### SMA (`/sma`)
- 2 Jurusan: IPA dan IPS
- Informasi akademik dan non-akademik
- Prestasi siswa
- Ekstrakurikuler

### SMP (`/smp`)
- Program unggulan: Web Programming, Tahfidz, Entrepreneurship
- Fasilitas dan kegiatan
- Informasi PPDB

### Chatbot (`/chat`)
- AI-powered chatbot "Robi"
- Menjawab pertanyaan umum tentang sekolah
- Rate limiting: 5 request/menit per IP

## 🔧 Konfigurasi

### Tailwind CSS Custom Colors

```javascript
colors: {
  primary: {
    DEFAULT: '#699D15',
    500: '#699d15',
    600: '#527e0f',
    // ... (lihat tailwind.config.js)
  },
  secondary: {
    DEFAULT: '#E9DC00',
    500: '#e9dc00',
    // ...
  }
}
```

### Groq API (Chatbot)

Chatbot menggunakan model **Llama 3.1-8b-instant** dari Groq dengan konfigurasi:
- Temperature: 0.3 (lebih konsisten)
- Max tokens: 300
- Rate limit: 5 request/menit

## 🚀 Deployment

### Production Build

```bash
# Build assets untuk production
npm run build

# Optimize Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Environment Variables (Production)

Pastikan set environment variables berikut di production:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
GROQ_API_KEY=your_production_key
```

## 🤝 Contributing

Kontribusi sangat diterima! Silakan:

1. Fork repository ini
2. Buat branch fitur baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📄 License

Proyek ini dilisensikan di bawah [MIT License](https://opensource.org/licenses/MIT).

## 👥 Tim Pengembang

Dikembangkan oleh tim IT Yayasan At-Taqwa Kemiri Jaya.

## 📞 Kontak

- **Website:** [citranegara.sch.id](https://citranegara.sch.id)
- **Email:** info@citranegara.sch.id
- **Telepon:** (021) 77213470
- **Alamat:** Jl. Raya Tanah Baru No.99 Kemiri Jaya, Beji, Depok 16421

---

<p align="center">Made with ❤️ for Citra Negara</p>
