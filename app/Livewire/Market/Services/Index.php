<?php

namespace App\Livewire\Market\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $services=Service::paginate(9);
        return view('livewire.market.services.index',compact('services'))->layout('layouts.market');
    }
}
