<?php

namespace App\Filament\Resources\ProfilKadisResource\Pages;

use App\Filament\Resources\ProfilKadisResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfilKadis extends EditRecord
{
    protected static string $resource = ProfilKadisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
