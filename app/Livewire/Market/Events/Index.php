<?php

namespace App\Livewire\Market\Events;

use App\Models\Event;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $events=Event::where('status','published')->latest()->paginate(10);
        return view('livewire.market.events.index',compact('events'))->layout('layouts.market');
    }
}
