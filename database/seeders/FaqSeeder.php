<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\FaqQuestion;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Apa alamat sekolah?,Dimana alamat sekolah?,Alamat SMK Citra Negara?',
                'answer'   => <<<TEXT
Alamat SMK Citra Negara: Jl. Tanah Baru Jl. Kemiri Jaya No.99, Beji, Kota Depok, Jawa Barat 16421.
📍 Google Maps: https://maps.app.goo.gl/1Vcff1KaUFw1huHK6

Alamat SMP Citra Negara: Jl. Tanah Baru No.99, Beji, Kota Depok, Jawa Barat 16421.
📍 Google Maps: https://maps.app.goo.gl/9bX5MUHPqUMhpg228
TEXT,
                'category' => 'alamat',
                'questions' => [
                    'Dimana Citra Negara berada?',
                    'Lokasi SMK Citra Negara?',
                    'alamat smk cn',
                ],
            ],
            [
                'question' => 'Berapa nomor telepon sekolah?,Kontak SMK Citra Negara?',
                'answer'   => <<<TEXT
Nomor telepon SMK Citra Negara: (021) 77213470.
Bisa juga melalui website resmi: https://smk.citranegara.sch.id/
TEXT,
                'category' => 'kontak',
                'questions' => [
                    'Bisa kasih nomor HP sekolah?',
                    'Cara menghubungi sekolah?',
                    'telepon sekolah',
                ],
            ],
            [
                'question' => 'Jurusan apa saja di SMK Citra Negara?,Program keahlian SMK Citra Negara?',
                'answer'   => <<<TEXT
Jurusan di SMK Citra Negara:
- RPL (Rekayasa Perangkat Lunak)
- TKJ (Teknik Komputer & Jaringan)
- Multimedia
- BDP (Bisnis Daring & Pemasaran)
- OTKP (Otomatisasi Tata Kelola Perkantoran)
- Perhotelan

Jurusan di SMA Citra Negara:
- IPA (Ilmu Pengetahuan Alam)
- IPS (Ilmu Pengetahuan Sosial)
TEXT,
                'category' => 'jurusan',
                'questions' => [
                    'Ada jurusan baru?',
                    'Program keahlian apa yang bisa dipilih?',
                    'jurusan smk cn',
                    'Jurusan SMA CN apa saja?',
                    'Program studi di SMA Citra Negara?',
                    'jurusan sma citra negara',
                ],
            ],
            [
                'question' => 'Apa website sekolah?,Alamat website SMK Citra Negara?',
                'answer'   => <<<TEXT
Website resmi:
- SMK: https://smk.citranegara.sch.id/
- SMP & Yayasan: https://citranegara.sch.id/
- SMA: https://sma.citranegara.sch.id/
TEXT,
                'category' => 'website',
                'questions' => [
                    'Website resmi sekolah apa?',
                    'Apakah ada profil sekolah online?',
                    'link web sekolah',
                ],
            ],
            [
                'question' => 'Fasilitas sekolah apa saja?,Apa fasilitas SMK Citra Negara?',
                'answer'   => <<<TEXT
Fasilitas: Laboratorium Komputer, Lab Multimedia, Lab Jaringan, Perpustakaan, Ruang Kelas nyaman, Aula, Musholla, dan sarana olahraga.
TEXT,
                'category' => 'fasilitas',
                'questions' => [
                    'Lab di sekolah ada apa saja?',
                    'Perpustakaan sekolah seperti apa?',
                    'fasilitas smk cn',
                ],
            ],
            [
                'question' => 'Bagaimana cara daftar PPDB?,Info pendaftaran siswa baru?,Kapan PPDB dibuka?',
                'answer'   => <<<TEXT
PPDB SMK Citra Negara biasanya dibuka awal tahun ajaran.
Pendaftaran online: https://smk.citranegara.sch.id/
Atau datang langsung ke sekolah:
📍 Google Maps: https://maps.app.goo.gl/1Vcff1KaUFw1huHK6
Info detail hubungi (021) 77213470.
TEXT,
                'category' => 'ppdb',
                'questions' => [
                    'Bagaimana cara daftar sekolah di Citra Negara?',
                    'Link pendaftaran siswa baru SMK Citra Negara?',
                    'ppdb smk cn',
                ],
            ],
            [
                'question' => 'Berapa biaya masuk SMK Citra Negara?,Syarat pendaftaran apa saja?',
                'answer'   => <<<TEXT
Biaya & syarat pendaftaran berbeda tiap tahun.
Umumnya: fotokopi ijazah, SKHU, KK, akta kelahiran, pas foto, serta formulir pendaftaran.
Untuk detail biaya terbaru, hubungi pihak sekolah: (021) 77213470.
TEXT,
                'category' => 'biaya',
                'questions' => [
                    'Syarat masuk apa saja?',
                    'Biaya daftar ulang berapa?',
                    'uang masuk smk cn',
                ],
            ],
            [
                'question' => 'Apa prestasi SMK Citra Negara?,Apakah sekolah ini berprestasi?',
                'answer'   => <<<TEXT
SMK Citra Negara aktif dalam lomba akademik & non-akademik (LKS, olahraga, seni).
Banyak alumni bekerja di industri & melanjutkan kuliah.
TEXT,
                'category' => 'prestasi',
                'questions' => [
                    'Prestasi apa yang pernah diraih sekolah?',
                    'Apakah alumninya banyak yang sukses?',
                    'prestasi smk cn',
                ],
            ],
            [
                'question' => 'Apa visi dan misi sekolah?,Visi SMK Citra Negara?,Misi SMP Citra Negara?',
                'answer'   => <<<TEXT
Visi: MANTAP → Mutu, Amanah, Nyaman, Taqwa, Aktif, Profesional.
Misi:
1. Menciptakan tenaga ahli lulusan sekolah menengah yang mandiri.
2. Memberdayakan semua komponen untuk mencapai prestasi maksimal.
3. Memberdayakan siswa melalui pembentukan kompetensi.
TEXT,
                'category' => 'visi_misi',
                'questions' => [
                    'Apa visi sekolah Citra Negara?',
                    'Misi SMK CN apa?',
                    'visi misi sekolah',
                ],
            ],
            [
                'question' => 'Siapa ketua yayasan Citra Negara?,Siapa pendiri sekolah ini?',
                'answer'   => <<<TEXT
Yayasan Citra Negara dipimpin oleh Ketua Yayasan: Drs. H. Nassan, MM.
Untuk informasi pendiri/founder, silakan hubungi pihak yayasan.
TEXT,
                'category' => 'yayasan',
                'questions' => [
                    'Siapa pimpinan yayasan sekolah ini?',
                    'Ketua yayasan CN siapa?',
                    'founder citra negara',
                    'penasihat',
                ],
            ],
            [
                'question' => 'Siapa kepala sekolah SMP Citra Negara?,Siapa kepala sekolah SMK Citra Negara?,Kepala sekolah SMA CN?',
                'answer'   => <<<TEXT
Kepala SMP Citra Negara: Ibu Rosmarina.
Kepala SMK Citra Negara: Abdul Kodir Zaelani, S.Pd.I.
Kepala SMA Citra Negara: Ahmad Taufik, S.Kom.
TEXT,
                'category' => 'kepala_sekolah',
                'questions' => [
                    'Kepsek SMP CN siapa?',
                    'Nama kepala sekolah SMK CN',
                    'kepala sekolah sma cn',
                ],
            ],
            [
                'question' => 'Kapan SMK Citra Negara berdiri?,Sejarah sekolah ini?',
                'answer'   => <<<TEXT
SMK Citra Negara berdiri sekitar tahun 2004 di bawah Yayasan Citra Negara.
Sekolah ini berkembang menjadi SMP, SMA, dan SMK dengan berbagai jurusan keahlian.
TEXT,
                'category' => 'sejarah',
                'questions' => [
                    'Sejarah singkat sekolah CN',
                    'Tahun berdiri SMK CN',
                    'asal mula sekolah citra negara',
                ],
            ],
        ];

        foreach ($faqs as $faqData) {
            $faq = Faq::create([
                'question' => $faqData['question'],
                'answer'   => $faqData['answer'],
                'category' => $faqData['category'],
                'domain' => 'citranegara.sch.id,smp.citranegara.sch.id,sma.citranegara.sch.id,smk.citranegara.sch.id',
            ]);

            $questions = collect($faqData['questions'])->map(fn($q) => [
                'faq_id'   => $faq->id,
                'question' => $q,
            ])->toArray();

            FaqQuestion::insert($questions);
        }
    }
}
