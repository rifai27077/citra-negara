<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Hapus atau comment default user factory
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Panggil FaqSeeder (dinonaktifkan karena App\Models\Faq sudah tidak ada)
        // $this->call(FaqSeeder::class);

        // Membuat akun admin bawaan agar panel admin bisa diakses
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Administrator',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );

        // Panggil seeder lainnya
        $this->call([
            DaftarHargaSeeder::class,
        ]);
    }
}
