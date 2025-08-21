<?php

namespace App\Filament\Resources\LayananResource\Pages;

use App\Filament\Resources\LayananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLayanan extends EditRecord
{
    protected static string $resource = LayananResource::class;
    
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
