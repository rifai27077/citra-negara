<?php

namespace App\Filament\Resources\DaftarHargas\Schemas;

use Filament\Schemas\Schema;

class DaftarHargaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Grid::make(1)
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('pendaftaran')
                            ->numeric()
                            ->prefix('Rp'),
                        \Filament\Forms\Components\TextInput::make('daftar_ulang')
                            ->numeric()
                            ->prefix('Rp'),
                        \Filament\Forms\Components\TextInput::make('total')
                            ->numeric()
                            ->prefix('Rp'),
                        \Filament\Forms\Components\TextInput::make('spp')
                            ->numeric()
                            ->prefix('Rp'),
                        \Filament\Forms\Components\Textarea::make('description')
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Select::make('category')
                            ->options([
                                'SMA' => 'SMA',
                                'SMP' => 'SMP',
                                'SMK' => 'SMK',
                            ])
                            ->required(),
                    ]),
            ]);
    }
}
