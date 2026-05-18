<?php

namespace App\Filament\Admin\Resources\KemahasiswaanResource\Pages;

use App\Filament\Admin\Resources\KemahasiswaanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKemahasiswaan extends EditRecord
{
    protected static string $resource = KemahasiswaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
