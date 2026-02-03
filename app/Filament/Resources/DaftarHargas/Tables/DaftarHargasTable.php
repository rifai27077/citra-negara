<?php

namespace App\Filament\Resources\DaftarHargas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class DaftarHargasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('pendaftaran')
                    ->money('IDR')
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('daftar_ulang')
                    ->money('IDR')
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('total')
                    ->money('IDR')
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('spp')
                    ->money('IDR')
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'SMA' => 'info',
                        'SMP' => 'warning',
                        'SMK' => 'success',
                        default => 'gray',
                    }),
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
