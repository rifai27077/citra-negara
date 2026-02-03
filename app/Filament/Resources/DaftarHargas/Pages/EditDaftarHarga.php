<?php

namespace App\Filament\Resources\DaftarHargas\Pages;

use App\Filament\Resources\DaftarHargas\DaftarHargaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDaftarHarga extends EditRecord
{
    protected static string $resource = DaftarHargaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
