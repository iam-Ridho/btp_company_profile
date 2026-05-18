<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DosenResource\Pages;
use App\Models\Dosen;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;

class DosenResource extends Resource
{
    protected static ?string $model = Dosen::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-academic-cap';
    protected static \UnitEnum|string|null $navigationGroup = 'Data SDM';
    protected static ?string $navigationLabel = 'Dosen';
    protected static ?string $modelLabel = 'Dosen';
    protected static ?string $pluralModelLabel = 'Dosen';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Data Dosen')
                ->schema([
                    Forms\Components\TextInput::make('nip')
                        ->label('NIP')
                        ->nullable()
                        ->numeric()
                        ->maxLength(20)
                        ->minLength(1)
                        ->placeholder('Masukkan NIP (maks. 20 angka)'),

                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Dosen')
                        ->required()
                        ->maxLength(255),

                    SpatieMediaLibraryFileUpload::make('photo')
                        ->label('Foto Dosen')
                        ->collection('photo')
                        ->image()
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('1:1')
                        ->columnSpanFull(),
                ])
                ->columns(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('photo')
                    ->label('Foto')
                    ->collection('photo')
                    ->circular()
                    ->width(50)
                    ->height(50),

                Tables\Columns\TextColumn::make('nip')
                    ->label('NIP')
                    ->searchable()
                    ->placeholder('-'),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Dosen')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('nama', 'asc')
            ->filters([])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListDosens::route('/'),
            'create' => Pages\CreateDosen::route('/create'),
            'edit'   => Pages\EditDosen::route('/{record}/edit'),
        ];
    }
}
