<?php

namespace App\Livewire\Market\Categories;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $category;
    use WithPagination;

    public function mount($slug)
    {
        $this->category=Category::where('status',1)->where('slug',$slug)->first();

    }
    public function render()
    {
        $posts=[];
        if ($this->category){
            $posts=Post::where('status','published')->where('category_id',$this->category->id)->paginate(10);
        }
        return view('livewire.market.categories.index',compact('posts'))->layout('layouts.market');
    }
}
