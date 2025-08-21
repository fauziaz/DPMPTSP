<?php

namespace App\Filament\Resources\TupoksiResource\Pages;

use App\Filament\Resources\TupoksiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTupoksi extends EditRecord
{
    protected static string $resource = TupoksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
