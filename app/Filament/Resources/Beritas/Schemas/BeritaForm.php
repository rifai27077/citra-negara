<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Schemas\Schema;

class BeritaForm
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
                            ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),
                        \Filament\Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        \Filament\Forms\Components\RichEditor::make('content')
                            ->required()
                            ->columnSpanFull(),
                        \Filament\Forms\Components\FileUpload::make('image')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatioOptions(['16:9'])
                            ->imageAspectRatio('16:9')
                            ->automaticallyOpenImageEditorForAspectRatio()
                            ->panelAspectRatio('16:9')
                            ->imagePreviewHeight('250')
                            ->directory('berita'),
                        \Filament\Forms\Components\Toggle::make('is_published')
                            ->default(false),
                        \Filament\Forms\Components\DateTimePicker::make('published_at'),
                    ]),
            ]);
    }
}
