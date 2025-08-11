<?php

namespace App\Filament\Resources\IKMResource\Pages;

use App\Filament\Resources\IKMResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIKM extends CreateRecord
{
    protected static string $resource = IKMResource::class;

    public function getTitle(): string
    {
        return 'Tambah IKM'; // Judul custom
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
