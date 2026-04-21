<?php

namespace App\Filament\Widgets;

use App\Models\Berita;
use App\Models\Prestasi;
use App\Models\Ekstrakurikuler;
use App\Models\DaftarHarga;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Berita', Berita::count())
                ->description('Berita terkini')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('success'),
            Stat::make('Total Prestasi', Prestasi::count())
                ->description('Pencapaian siswa')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('success'),
            Stat::make('Ekstrakurikuler', Ekstrakurikuler::count())
                ->description('Kegiatan siswa')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),
            Stat::make('Total Daftar Harga', DaftarHarga::count())
                ->description('Data biaya pendidikan')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),
        ];
    }
}
