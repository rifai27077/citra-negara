<?php

namespace App\Filament\Resources\DaftarHargas\Pages;

use App\Filament\Resources\DaftarHargas\DaftarHargaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDaftarHargas extends ListRecords
{
    protected static string $resource = DaftarHargaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
