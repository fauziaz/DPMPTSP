<?php

namespace App\Filament\Resources\DokumenEvaluasiResource\Pages;

use App\Filament\Resources\DokumenEvaluasiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDokumenEvaluasi extends CreateRecord
{
    protected static string $resource = DokumenEvaluasiResource::class;

    public function getTitle(): string
    {
        return 'Tambah Dokumen Evaluasi'; // Judul custom
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
