<?php

namespace App\Filament\Resources\ProdukHukumResource\Pages;

use App\Filament\Resources\ProdukHukumResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProdukHukum extends CreateRecord
{
    protected static string $resource = ProdukHukumResource::class;

    public function getTitle(): string
    {
        return 'Tambah Produk Hukum'; // Judul custom
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
