<?php

namespace App\Filament\Resources\PengumumanResource\Pages;

use App\Filament\Resources\PengumumanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengumuman extends EditRecord
{
    protected static string $resource = PengumumanResource::class;

    public function getTitle(): string
    {
        return 'Edit Pengumuman'; // Judul custom
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
