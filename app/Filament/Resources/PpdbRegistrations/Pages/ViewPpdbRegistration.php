<?php

namespace App\Filament\Resources\PpdbRegistrations\Pages;

use App\Filament\Resources\PpdbRegistrations\PpdbRegistrationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPpdbRegistration extends ViewRecord
{
    protected static string $resource = PpdbRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
