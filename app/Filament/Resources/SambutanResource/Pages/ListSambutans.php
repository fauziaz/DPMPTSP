<?php

namespace App\Filament\Resources\SambutanResource\Pages;

use App\Filament\Resources\SambutanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSambutans extends ListRecords
{
    protected static string $resource = SambutanResource::class;

    public function getTitle(): string
    {
        return 'Lihat Sambutan'; // Judul custom
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
