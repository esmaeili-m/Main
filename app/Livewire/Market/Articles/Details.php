<?php

namespace App\Livewire\Market\Articles;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Subscribe;
use Livewire\Component;

class Details extends Component
{
    public $slug;
    public $email_sub;
    public $name,$email,$content;

    public function create()
    {
        $data=$this->validate([
            'email' => 'required|email'
        ]);
        Subscribe::create($data);
        session()->flash('message','Your Email was sent successfully.');
        $this->reset('email');
    }
    public function mount($slug)
    {
        $this->slug=$slug;
    }
    public function create_comment()
    {
        $validate = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'content' => 'required|string|min:5',
        ]);
        $article_model = new \App\Models\Article();
        $validate['commentable_type']= get_class($article_model);
        $article=Article::where('slug',$this->slug)->where('status','published')->first();
        $validate['commentable_id']= $article->id;
        Comment::create($validate);
        session()->flash('save_comment','Your Comment was sent successfully.');
        $this->reset('name','email','content');

    }
    public function render()
    {
        $article=Article::where('slug',$this->slug)->with(['tags','comments'])->where('status','published')->first();
        return view('livewire.market.articles.details',compact('article'))->layout('layouts.market');
    }
}
