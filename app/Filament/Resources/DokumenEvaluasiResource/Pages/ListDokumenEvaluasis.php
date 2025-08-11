<?php

namespace App\Filament\Resources\DokumenEvaluasiResource\Pages;

use App\Filament\Resources\DokumenEvaluasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDokumenEvaluasis extends ListRecords
{
    protected static string $resource = DokumenEvaluasiResource::class;

    public function getTitle(): string
    {
        return 'Daftar Dokumen Evaluasi'; 
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
