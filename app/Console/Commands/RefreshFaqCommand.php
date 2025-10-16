<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RefreshFaqCommand extends Command
{
    protected $signature = 'faq:refresh';
    protected $description = 'Refresh FAQ data: migrate, seed, reindex search';

    public function handle()
    {
        $this->line("▶ Jalankan migrate:refresh --seed ...");
        Artisan::call('migrate:refresh', ['--seed' => true]);
        $this->info(Artisan::output());

        $this->line("▶ Jalankan db:seed khusus FaqSeeder ...");
        Artisan::call('db:seed', ['--class' => 'FaqSeeder']);
        $this->info(Artisan::output());

        $indexPath = storage_path('faqs.index');

        // Coba hapus file index manual
        if (file_exists($indexPath)) {
            try {
                unlink($indexPath);
                $this->info("🗑 File index lama dihapus manual: $indexPath");

                $this->line("▶ Flush index lama ...");
                Artisan::call('scout:flush', ['model' => "App\\Models\\Faq"]);
                $this->info(Artisan::output());
            } catch (\Throwable $e) {
                $this->error("❌ Tidak bisa hapus index: " . $e->getMessage());
                $this->warn("⚡ Lanjut import tanpa flush...");
            }
        } else {
            $this->warn("⚡ Tidak ada file index lama, lanjut import...");
        }

        // Import ulang data ke TNTSearch
        $this->line("▶ Import ulang FAQ ke Scout ...");
        Artisan::call('scout:import', ['model' => "App\\Models\\Faq"]);
        $this->info(Artisan::output());

        $this->info("✅ FAQ berhasil diperbarui & diindeks ulang!");
    }
}
