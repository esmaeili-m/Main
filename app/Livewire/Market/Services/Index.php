<?php

namespace App\Livewire\Market\Services;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.market.services.index')->layout('layouts.market');
    }
}
