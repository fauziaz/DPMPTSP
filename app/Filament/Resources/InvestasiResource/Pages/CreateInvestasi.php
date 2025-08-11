<?php

namespace App\Filament\Resources\InvestasiResource\Pages;

use App\Filament\Resources\InvestasiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInvestasi extends CreateRecord
{
    protected static string $resource = InvestasiResource::class;

    public function getTitle(): string
    {
        return 'Tambah Investasi'; // Judul custom
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
