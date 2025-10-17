<?php

namespace App\Livewire\Market\News;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.market.news.index')->layout('layouts.market');
    }
}
