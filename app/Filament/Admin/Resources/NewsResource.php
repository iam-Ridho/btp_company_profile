<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\NewsResource\Pages;
use App\Models\News;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-newspaper';
    protected static \UnitEnum|string|null $navigationGroup = 'Konten';
    protected static ?string $navigationLabel = 'Berita';
    protected static ?string $modelLabel = 'Berita';
    protected static ?string $pluralModelLabel = 'Berita';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Informasi Berita')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('author')
                        ->label('Penulis')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Select::make('kategori')
                        ->label('Kategori')
                        ->options([
                            'informasi' => 'Informasi',
                            'acara'     => 'Acara',
                            'karir'     => 'Karir',
                        ])
                        ->default('informasi')
                        ->required(),

                    Forms\Components\DateTimePicker::make('published_at')
                        ->label('Tanggal Publish')
                        ->nullable(),

                    Forms\Components\Textarea::make('excerpt')
                        ->label('Ringkasan')
                        ->rows(3)
                        ->columnSpanFull(),

                    Forms\Components\RichEditor::make('body')
                        ->label('Konten')
                        ->required()
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Section::make('Foto Utama')
                ->schema([
                    SpatieMediaLibraryFileUpload::make('featured')
                        ->label('Foto Berita')
                        ->collection('featured')
                        ->disk('public')
                        ->image()
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('16:9')
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('featured')
                    ->label('Foto')
                    ->collection('featured')
                    ->conversion('thumb')
                    ->circular(false)
                    ->width(80)
                    ->height(50),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->limit(40)
                    ->tooltip(fn ($record) => $record->title),

                Tables\Columns\TextColumn::make('author')
                    ->label('Penulis')
                    ->searchable(),

                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'informasi' => 'primary',
                        'acara'     => 'warning',
                        'karir'     => 'success',
                        default     => 'gray',
                    }),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tanggal Publish')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->placeholder('Draft'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'informasi' => 'Informasi',
                        'acara'     => 'Acara',
                        'karir'     => 'Karir',
                    ]),
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
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
            'index'  => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit'   => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
