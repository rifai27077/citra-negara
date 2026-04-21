<?php

namespace App\Filament\Resources\Prestasis\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PrestasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->default(null),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                DatePicker::make('date')
                    ->required(),
                Select::make('category')
                    ->options([
                        'SMA' => 'SMA',
                        'SMP' => 'SMP',
                        'SMK' => 'SMK',
                    ])
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->directory('prestasi'),
            ]);
    }
}
