<?php

namespace App\Filament\Resources\IKMResource\Pages;

use App\Filament\Resources\IKMResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIKMS extends ListRecords
{
    protected static string $resource = IKMResource::class;

    public function getTitle(): string
    {
        return 'Daftar IKM'; // Judul custom
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
