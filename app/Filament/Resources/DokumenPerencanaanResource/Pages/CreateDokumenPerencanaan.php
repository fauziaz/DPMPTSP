<?php

namespace App\Filament\Resources\DokumenPerencanaanResource\Pages;

use App\Filament\Resources\DokumenPerencanaanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDokumenPerencanaan extends CreateRecord
{
    protected static string $resource = DokumenPerencanaanResource::class;

    public function getTitle(): string
    {
        return 'Tambah Dokumen Perencanaan'; // Judul custom
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
