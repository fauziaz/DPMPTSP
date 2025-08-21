<?php

namespace App\Filament\Resources\ProfilKadisResource\Pages;

use App\Filament\Resources\ProfilKadisResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfilKadis extends ListRecords
{
    protected static string $resource = ProfilKadisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
