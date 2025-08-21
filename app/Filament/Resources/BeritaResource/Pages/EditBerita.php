<?php

namespace App\Filament\Resources\BeritaResource\Pages;

use App\Filament\Resources\BeritaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBerita extends EditRecord
{
    protected static string $resource = BeritaResource::class;

    public function getTitle(): string
    {
        return 'Edit Berita atau Artikel'; // Judul custom
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
