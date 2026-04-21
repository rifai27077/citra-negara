<?php

namespace App\Filament\Resources\PpdbRegistrations\Pages;

use App\Filament\Resources\PpdbRegistrations\PpdbRegistrationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPpdbRegistration extends EditRecord
{
    protected static string $resource = PpdbRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
