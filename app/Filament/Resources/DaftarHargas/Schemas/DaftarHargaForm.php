<?php

namespace App\Filament\Resources\DaftarHargas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DaftarHargaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('price')
                    ->numeric()
                    ->prefix('Rp'),
                TextInput::make('pendaftaran')
                    ->numeric(),
                TextInput::make('daftar_ulang')
                    ->numeric(),
                TextInput::make('total')
                    ->numeric(),
                TextInput::make('spp')
                    ->numeric(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('category')
                    ->options([
                        'SMA' => 'SMA',
                        'SMP' => 'SMP',
                        'SMK' => 'SMK',
                    ])
                    ->required(),
            ]);
    }
}
