<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KemahasiswaanResource\Pages;
use App\Models\Kemahasiswaan;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;

class KemahasiswaanResource extends Resource
{
    protected static ?string $model = Kemahasiswaan::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-users';
    protected static \UnitEnum|string|null $navigationGroup = 'Konten';
    protected static ?string $navigationLabel = 'Kemahasiswaan';
    protected static ?string $modelLabel = 'Kemahasiswaan';
    protected static ?string $pluralModelLabel = 'Kemahasiswaan';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Data Kemahasiswaan')
                ->schema([
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Kegiatan')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('judul')
                        ->label('Judul')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Textarea::make('body')
                        ->label('Deskripsi')
                        ->rows(4)
                        ->columnSpanFull(),

                    SpatieMediaLibraryFileUpload::make('image')
                        ->label('Foto')
                        ->collection('image')
                        ->image()
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('16:9')
                        ->columnSpanFull(),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('image')
                    ->label('Foto')
                    ->collection('image')
                    ->width(80)
                    ->height(50),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Kegiatan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->limit(40),

                Tables\Columns\TextColumn::make('body')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->placeholder('-')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
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
            'index'  => Pages\ListKemahasiswaans::route('/'),
            'create' => Pages\CreateKemahasiswaan::route('/create'),
            'edit'   => Pages\EditKemahasiswaan::route('/{record}/edit'),
        ];
    }
}
