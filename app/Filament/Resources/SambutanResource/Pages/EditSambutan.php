<?php

namespace App\Filament\Resources\SambutanResource\Pages;

use App\Filament\Resources\SambutanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSambutan extends EditRecord
{
    protected static string $resource = SambutanResource::class;

    public function getTitle(): string
    {
        return 'Edit Sambutan'; // Judul custom
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
