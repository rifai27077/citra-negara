<?php

namespace App\Filament\Resources\PpdbRegistrations\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PpdbRegistrationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_lengkap'),
                TextEntry::make('nisn'),
                TextEntry::make('tempat_lahir'),
                TextEntry::make('tanggal_lahir')
                    ->date(),
                TextEntry::make('jenis_kelamin')
                    ->badge(),
                TextEntry::make('alamat')
                    ->columnSpanFull(),
                TextEntry::make('no_telepon')
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('sekolah_asal'),
                TextEntry::make('alamat_sekolah')
                    ->columnSpanFull(),
                TextEntry::make('jenjang')
                    ->badge(),
                TextEntry::make('jurusan')
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('catatan')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
