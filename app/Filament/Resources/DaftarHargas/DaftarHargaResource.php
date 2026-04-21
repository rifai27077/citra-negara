<?php

namespace App\Filament\Resources\DaftarHargas;

use App\Filament\Resources\DaftarHargas\Pages\CreateDaftarHarga;
use App\Filament\Resources\DaftarHargas\Pages\EditDaftarHarga;
use App\Filament\Resources\DaftarHargas\Pages\ListDaftarHargas;
use App\Filament\Resources\DaftarHargas\Schemas\DaftarHargaForm;
use App\Filament\Resources\DaftarHargas\Tables\DaftarHargasTable;
use App\Models\DaftarHarga;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DaftarHargaResource extends Resource
{
    protected static ?string $model = DaftarHarga::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationLabel = 'Daftar Harga';
    protected static ?string $pluralModelLabel = 'Daftar Harga';
    protected static ?string $modelLabel = 'Daftar Harga';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return DaftarHargaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DaftarHargasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDaftarHargas::route('/'),
            'create' => CreateDaftarHarga::route('/create'),
            'edit' => EditDaftarHarga::route('/{record}/edit'),
        ];
    }
}
