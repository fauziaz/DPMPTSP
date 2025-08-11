<?php

namespace App\Filament\Resources\DokumenPerencanaanResource\Pages;

use App\Filament\Resources\DokumenPerencanaanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDokumenPerencanaan extends EditRecord
{
    protected static string $resource = DokumenPerencanaanResource::class;

    public function getTitle(): string
    {
        return 'Edit Dokumen Perencanaan'; // Judul custom
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
