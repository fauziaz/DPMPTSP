<?php

namespace App\Filament\Resources\DokumenPerencanaanResource\Pages;

use App\Filament\Resources\DokumenPerencanaanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDokumenPerencanaans extends ListRecords
{
    protected static string $resource = DokumenPerencanaanResource::class;

    public function getTitle(): string
    {
        return 'Daftar Dokumen Perencanaan'; // Judul custom
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
