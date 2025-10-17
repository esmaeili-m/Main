<?php

namespace App\Livewire\Market\Speeches;

use App\Models\Post;
use Livewire\Component;

class Details extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug=$slug;
    }
    public function render()
    {
        $post=Post::where('status','published')->where('slug',$this->slug)->first();
        $posts=Post::where('status','published')->where('category_id',$post->category_id)->whereNot('id',$post->id)->get();
        return view('livewire.market.speeches.details',compact('post','posts'))->layout('layouts.market');
    }
}
