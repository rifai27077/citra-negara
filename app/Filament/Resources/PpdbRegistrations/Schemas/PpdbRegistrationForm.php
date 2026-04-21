<?php

namespace App\Filament\Resources\PpdbRegistrations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PpdbRegistrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_lengkap')
                    ->required(),
                TextInput::make('nisn')
                    ->required(),
                TextInput::make('tempat_lahir')
                    ->required(),
                DatePicker::make('tanggal_lahir')
                    ->required(),
                Select::make('jenis_kelamin')
                    ->options(['L' => 'L', 'P' => 'P'])
                    ->required(),
                Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('no_telepon')
                    ->tel()
                    ->default(null),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('sekolah_asal')
                    ->required(),
                Textarea::make('alamat_sekolah')
                    ->required()
                    ->columnSpanFull(),
                Select::make('jenjang')
                    ->options(['smk' => 'Smk', 'smp' => 'Smp', 'sma' => 'Sma'])
                    ->required(),
                TextInput::make('jurusan')
                    ->default(null),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'diterima' => 'Diterima', 'ditolak' => 'Ditolak'])
                    ->default('pending')
                    ->required(),
                Textarea::make('catatan')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
