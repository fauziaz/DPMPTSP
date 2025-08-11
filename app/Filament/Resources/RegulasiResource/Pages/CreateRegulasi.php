<?php

namespace App\Filament\Resources\RegulasiResource\Pages;

use App\Filament\Resources\RegulasiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRegulasi extends CreateRecord
{
    protected static string $resource = RegulasiResource::class;

    public function getTitle(): string
    {
        return 'Tambah Regulasi Baru'; // Judul custom
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
