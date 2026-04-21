<?php

namespace App\Filament\Resources\PpdbRegistrations\Pages;

use App\Filament\Resources\PpdbRegistrations\PpdbRegistrationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPpdbRegistrations extends ListRecords
{
    protected static string $resource = PpdbRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
