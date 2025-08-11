<?php

namespace App\Filament\Resources\ProdukHukumResource\Pages;

use App\Filament\Resources\ProdukHukumResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProdukHukums extends ListRecords
{
    protected static string $resource = ProdukHukumResource::class;

    public function getTitle(): string
    {
        return 'Lihat Produk Hukum'; // Judul custom
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
