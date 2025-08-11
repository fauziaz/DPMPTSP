<?php

namespace App\Filament\Resources\SektoralResource\Pages;

use App\Filament\Resources\SektoralResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSektoral extends CreateRecord
{
    protected static string $resource = SektoralResource::class;

    public function getTitle(): string
    {
        return 'Tambah Data Statistik Sektoral Baru'; // Judul custom
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
