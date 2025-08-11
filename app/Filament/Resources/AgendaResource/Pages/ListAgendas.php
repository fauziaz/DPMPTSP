<?php

namespace App\Filament\Resources\AgendaResource\Pages;

use App\Filament\Resources\AgendaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Columns\TextColumn;

class ListAgendas extends ListRecords
{
    protected static string $resource = AgendaResource::class;

    public function getTitle(): string
    {
        return 'Daftar Agenda'; // Judul custom
    }

    // protected function getTableColumns(): array
    // {
    //     return [
    //         TextColumn::make('nama_event')
    //             ->label('Nama Event'),

    //         TextColumn::make('status_dinamis')
    //             ->label('Status')
    //             ->view('components.status-badge'), // pakai view custom
    //     ];
    // }

    protected function getPollingInterval(): ?int
{
    return 30_000; // reload Livewire setiap 30 detik (30000 ms)
}


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
