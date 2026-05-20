<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\LabResource\Pages;
use App\Models\Lab;
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

class LabResource extends Resource
{
    protected static ?string $model = Lab::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-beaker';
    protected static \UnitEnum|string|null $navigationGroup = 'Fasilitas';
    protected static ?string $navigationLabel = 'Laboratorium';
    protected static ?string $modelLabel = 'Laboratorium';
    protected static ?string $pluralModelLabel = 'Laboratorium';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Data Laboratorium')
                ->schema([
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Lab')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Textarea::make('caption')
                        ->label('Keterangan')
                        ->rows(3)
                        ->nullable()
                        ->columnSpanFull(),

                    SpatieMediaLibraryFileUpload::make('photo')
                        ->label('Foto Lab')
                        ->collection('photo')
                        ->disk('public')
                        ->image()
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('16:9')
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
                    ->width(80)
                    ->height(50),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Lab')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('caption')
                    ->label('Keterangan')
                    ->limit(50)
                    ->placeholder('-'),

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
            'index'  => Pages\ListLabs::route('/'),
            'create' => Pages\CreateLab::route('/create'),
            'edit'   => Pages\EditLab::route('/{record}/edit'),
        ];
    }
}
