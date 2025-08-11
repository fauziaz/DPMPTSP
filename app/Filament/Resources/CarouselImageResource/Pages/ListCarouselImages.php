<?php

namespace App\Filament\Resources\CarouselImageResource\Pages;

use App\Filament\Resources\CarouselImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarouselImages extends ListRecords
{
    protected static string $resource = CarouselImageResource::class;

    public function getTitle(): string
    {
        return 'Daftar Carousel'; // Judul custom
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
