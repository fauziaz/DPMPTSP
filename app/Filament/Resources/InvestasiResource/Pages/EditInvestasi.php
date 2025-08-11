<?php

namespace App\Filament\Resources\InvestasiResource\Pages;

use App\Filament\Resources\InvestasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInvestasi extends EditRecord
{
    protected static string $resource = InvestasiResource::class;

    public function getTitle(): string
    {
        return 'Edit Investasi'; // Judul custom
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
