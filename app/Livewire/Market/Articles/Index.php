<?php

namespace App\Livewire\Market\Articles;

use App\Models\Article;
use App\Models\Subscribe;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '';
    public $email;
    protected $paginationTheme = 'bootstrap';
    public function searchArticles()
    {
    }

    public function create()
    {
        $data=$this->validate([
           'email' => 'required|email'
        ]);
        Subscribe::create($data);
        session()->flash('message','Your message was sent successfully.');
        $this->reset('email');
    }
    public function render()
    {
        $articles = Article::where('status', 'published')
            ->where(function ($query) {
                $query->where('title', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%");
            })
            ->with(['tags', 'category'])
            ->latest()
            ->paginate(6);
        return view('livewire.market.articles.index',compact('articles'))->layout('layouts.market');
    }
}
