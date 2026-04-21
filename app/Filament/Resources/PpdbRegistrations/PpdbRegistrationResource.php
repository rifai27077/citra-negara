<?php

namespace App\Filament\Resources\PpdbRegistrations;

use App\Filament\Resources\PpdbRegistrations\Pages\CreatePpdbRegistration;
use App\Filament\Resources\PpdbRegistrations\Pages\EditPpdbRegistration;
use App\Filament\Resources\PpdbRegistrations\Pages\ListPpdbRegistrations;
use App\Filament\Resources\PpdbRegistrations\Pages\ViewPpdbRegistration;
use App\Filament\Resources\PpdbRegistrations\Schemas\PpdbRegistrationForm;
use App\Filament\Resources\PpdbRegistrations\Schemas\PpdbRegistrationInfolist;
use App\Filament\Resources\PpdbRegistrations\Tables\PpdbRegistrationsTable;
use App\Models\PpdbRegistration;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PpdbRegistrationResource extends Resource
{
    protected static ?string $model = PpdbRegistration::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'SPMB (Pendaftar)';
    protected static ?string $pluralModelLabel = 'Data Pendaftar SPMB';
    protected static ?string $modelLabel = 'Pendaftar SPMB';

    protected static ?string $recordTitleAttribute = 'nama_lengkap';

    public static function form(Schema $schema): Schema
    {
        return PpdbRegistrationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PpdbRegistrationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PpdbRegistrationsTable::configure($table);
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
            'index' => ListPpdbRegistrations::route('/'),
            'create' => CreatePpdbRegistration::route('/create'),
            'view' => ViewPpdbRegistration::route('/{record}'),
            'edit' => EditPpdbRegistration::route('/{record}/edit'),
        ];
    }
}
