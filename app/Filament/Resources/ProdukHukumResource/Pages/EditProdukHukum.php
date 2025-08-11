<?php

namespace App\Filament\Resources\ProdukHukumResource\Pages;

use App\Filament\Resources\ProdukHukumResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProdukHukum extends EditRecord
{
    protected static string $resource = ProdukHukumResource::class;

    public function getTitle(): string
    {
        return 'Edit Produk Hukum'; // Judul custom
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
