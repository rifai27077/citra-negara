<?php

namespace App\Filament\Resources\Ekstrakurikulers\Pages;

use App\Filament\Resources\Ekstrakurikulers\EkstrakurikulerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEkstrakurikulers extends ListRecords
{
    protected static string $resource = EkstrakurikulerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
