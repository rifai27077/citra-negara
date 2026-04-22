<?php

namespace Database\Seeders;

use App\Models\DaftarHarga;
use Illuminate\Database\Seeder;

class DaftarHargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prices = [
            [
                'title' => 'Biaya Pendaftaran SMP (Gelombang 1)',
                'price' => 2750000,
                'pendaftaran' => 250000,
                'daftar_ulang' => 2500000,
                'total' => 2750000,
                'spp' => 350000,
                'description' => 'Biaya pendaftaran untuk siswa baru tingkat SMP Citra Negara meliputi uang seragam, buku, dan uang gedung.',
                'category' => 'SMP',
            ],
            [
                'title' => 'Biaya Pendaftaran SMA (Gelombang 1)',
                'price' => 3300000,
                'pendaftaran' => 300000,
                'daftar_ulang' => 3000000,
                'total' => 3300000,
                'spp' => 450000,
                'description' => 'Biaya pendaftaran untuk siswa baru tingkat SMA Citra Negara meliputi uang seragam, buku, dan fasilitas sekolah.',
                'category' => 'SMA',
            ],
            [
                'title' => 'Biaya Pendaftaran SMK (Gelombang 1)',
                'price' => 3800000,
                'pendaftaran' => 300000,
                'daftar_ulang' => 3500000,
                'total' => 3800000,
                'spp' => 500000,
                'description' => 'Biaya pendaftaran untuk siswa baru tingkat SMK Citra Negara untuk jurusan PPLG, TJKT, DKV, dan lainnya.',
                'category' => 'SMK',
            ],
        ];

        foreach ($prices as $price) {
            DaftarHarga::updateOrCreate(
                ['title' => $price['title'], 'category' => $price['category']],
                $price
            );
        }
    }
}
