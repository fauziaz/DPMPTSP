<?php

namespace App\Filament\Resources\CarouselImageResource\Pages;

use App\Filament\Resources\CarouselImageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;


class CreateCarouselImage extends CreateRecord
{
    protected static string $resource = CarouselImageResource::class;

    public function getTitle(): string
    {
        return 'Tambah Carousel Baru'; // Judul custom
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
