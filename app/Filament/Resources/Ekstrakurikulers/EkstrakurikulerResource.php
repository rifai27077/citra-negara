<?php

namespace App\Filament\Resources\Ekstrakurikulers;

use App\Filament\Resources\Ekstrakurikulers\Pages\ManageEkstrakurikulers;
use App\Models\Ekstrakurikuler;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Illuminate\Support\Str;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EkstrakurikulerResource extends Resource
{
    protected static ?string $model = Ekstrakurikuler::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static ?string $recordTitleAttribute = 'name';
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (callable $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(Ekstrakurikuler::class, ignoreRecord: true),
                Select::make('category')
                    ->options([
                        'SMA' => 'SMA',
                        'SMP' => 'SMP',
                        'SMK' => 'SMK',
                    ])
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatioOptions(['16:9'])
                    ->imageAspectRatio('16:9')
                    ->automaticallyOpenImageEditorForAspectRatio()
                    ->panelAspectRatio('16:9')
                    ->imagePreviewHeight('250')
                    ->directory('ekstrakurikuler'),
                RichEditor::make('description')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'SMA' => 'info',
                        'SMP' => 'warning',
                        'SMK' => 'success',
                        default => 'gray',
                    }),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'SMA' => 'SMA',
                        'SMP' => 'SMP',
                        'SMK' => 'SMK',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageEkstrakurikulers::route('/'),
        ];
    }
}
