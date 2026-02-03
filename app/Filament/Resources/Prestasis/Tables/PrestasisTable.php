<?php

namespace App\Filament\Resources\Prestasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class PrestasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('image'),
                \Filament\Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'SMA' => 'info',
                        'SMP' => 'warning',
                        'SMK' => 'success',
                        default => 'gray',
                    }),
                \Filament\Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
