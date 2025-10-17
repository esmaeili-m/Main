<?php

namespace App\Livewire\Market\Speeches;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $posts=Post::where('status','published')->paginate(9);
        return view('livewire.market.speeches.index',compact('posts'))->layout('layouts.market');
    }
}
