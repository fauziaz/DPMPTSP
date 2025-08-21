<?php

namespace App\Filament\Resources\BeritaResource\Pages;

use App\Filament\Resources\BeritaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBerita extends CreateRecord
{
    protected static string $resource = BeritaResource::class;
    
    public function getTitle(): string
    {
        return 'Tambah Berita atau Artikel'; // Judul custom
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
