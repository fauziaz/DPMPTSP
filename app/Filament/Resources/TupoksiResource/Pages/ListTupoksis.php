<?php

namespace App\Filament\Resources\TupoksiResource\Pages;

use App\Filament\Resources\TupoksiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTupoksis extends ListRecords
{
    protected static string $resource = TupoksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
