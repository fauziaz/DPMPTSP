<?php

namespace App\Filament\Resources\DokumenEvaluasiResource\Pages;

use App\Filament\Resources\DokumenEvaluasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDokumenEvaluasi extends EditRecord
{
    protected static string $resource = DokumenEvaluasiResource::class;

    public function getTitle(): string
    {
        return 'Edit Dokumen Evaluasi'; 
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
