<?php

namespace App\Filament\Resources\SektoralResource\Pages;

use App\Filament\Resources\SektoralResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSektoral extends EditRecord
{
    protected static string $resource = SektoralResource::class;

    public function getTitle(): string
    {
        return 'Edit Data Statistik Sektoral'; // Judul custom
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
