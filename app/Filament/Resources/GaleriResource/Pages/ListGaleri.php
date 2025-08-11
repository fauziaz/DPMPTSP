<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use App\Filament\Resources\GaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGaleri extends ListRecords
{
    protected static string $resource = GaleriResource::class;

    public function getTitle(): string
    {
        return 'Daftar Galeri Foto'; // Judul custom
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
