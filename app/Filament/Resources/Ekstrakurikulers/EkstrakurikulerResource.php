<?php

namespace App\Filament\Resources\Ekstrakurikulers;

use App\Filament\Resources\Ekstrakurikulers\Pages\CreateEkstrakurikuler;
use App\Filament\Resources\Ekstrakurikulers\Pages\EditEkstrakurikuler;
use App\Filament\Resources\Ekstrakurikulers\Pages\ListEkstrakurikulers;
use App\Filament\Resources\Ekstrakurikulers\Schemas\EkstrakurikulerForm;
use App\Filament\Resources\Ekstrakurikulers\Tables\EkstrakurikulersTable;
use App\Models\Ekstrakurikuler;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EkstrakurikulerResource extends Resource
{
    protected static ?string $model = Ekstrakurikuler::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Ekstrakurikuler';
    protected static ?string $pluralModelLabel = 'Ekstrakurikuler';
    protected static ?string $modelLabel = 'Ekstrakurikuler';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return EkstrakurikulerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EkstrakurikulersTable::configure($table);
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
            'index' => ListEkstrakurikulers::route('/'),
            'create' => CreateEkstrakurikuler::route('/create'),
            'edit' => EditEkstrakurikuler::route('/{record}/edit'),
        ];
    }
}
