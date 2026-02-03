<?php

namespace App\Filament\Resources\Prestasis\Schemas;

use Filament\Schemas\Schema;

class PrestasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Grid::make(1)
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (callable $set, ?string $state) => $set('slug', \Illuminate\Support\Str::slug($state))),
                        \Filament\Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(\App\Models\Prestasi::class, ignoreRecord: true),
                        \Filament\Forms\Components\RichEditor::make('description')
                            ->columnSpanFull(),
                        \Filament\Forms\Components\DatePicker::make('date')
                            ->required(),
                        \Filament\Forms\Components\Select::make('category')
                            ->options([
                                'SMA' => 'SMA',
                                'SMP' => 'SMP',
                                'SMK' => 'SMK',
                            ])
                            ->required(),
                        \Filament\Forms\Components\FileUpload::make('image')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatioOptions(['4:5'])
                            ->imageAspectRatio('4:5')
                            ->automaticallyOpenImageEditorForAspectRatio()
                            ->panelAspectRatio('4:5')
                            ->imagePreviewHeight('250')
                            ->directory('prestasi'),
                    ]),
            ]);
    }
}
