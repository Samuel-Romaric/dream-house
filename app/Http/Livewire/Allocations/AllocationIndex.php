<?php

namespace App\Http\Livewire\Allocations;

use Livewire\Component;

class AllocationIndex extends Component
{
    public $amenitie;

    public function mount($amenitie)
    {
        $this->amenitie = $amenitie;
    }

    public function render()
    {
        return view('livewire.allocations.allocation-index');
    }
}
