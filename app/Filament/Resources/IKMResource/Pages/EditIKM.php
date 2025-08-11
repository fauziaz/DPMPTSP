<?php

namespace App\Filament\Resources\IKMResource\Pages;

use App\Filament\Resources\IKMResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIKM extends EditRecord
{
    protected static string $resource = IKMResource::class;

    public function getTitle(): string
    {
        return 'Edit IKM'; // Judul custom
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
