<?php

namespace App\Livewire\Beranda;

use Livewire\Component;
use Carbon\Carbon;

class Agenda extends Component
{
    public $selectedDate;
    public $weekDates = [];

    public function mount()
    {
        $this->selectedDate = Carbon::now();
        $this->generateWeekDates();
    }

    public function selectDate($date)
    {
        $this->selectedDate = Carbon::parse($date);
        $this->generateWeekDates();
    }

    public function generateWeekDates()
    {
        $startOfWeek = Carbon::parse($this->selectedDate)->startOfWeek(Carbon::MONDAY);
        $this->weekDates = [];

        for ($i = 0; $i < 7; $i++) {
            $this->weekDates[] = $startOfWeek->copy()->addDays($i);
        }
    }

    public function render()
    {
        return view('livewire.beranda.agenda');
    }
}
