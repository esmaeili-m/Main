<?php

namespace App\Livewire\Market\Events;

use App\Models\Comment;
use App\Models\Event;
use App\Models\Subscribe;
use Livewire\Component;

class Details extends Component
{
    public $slug;
    public $email_sub;
    public $name,$email,$content;
    public function mount($slug)
    {
        $this->slug=$slug;
    }
    public function create()
    {
        $data=$this->validate([
            'email' => 'required|email'
        ]);
        Subscribe::create($data);
        session()->flash('message','Your Email was sent successfully.');
        $this->reset('email');
    }
    public function create_comment()
    {
        $validate = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'content' => 'required|string|min:5',
        ]);
        $event = new \App\Models\Event();
        $validate['commentable_type']= get_class($event);
        $ev=Event::where('status','published')->where('slug',$this->slug)->with('category')->first();
        $validate['commentable_id']= $ev->id;
        Comment::create($validate);
        session()->flash('save_comment','Your Comment was sent successfully.');
        $this->reset('name','email','content');

    }
    public function render()
    {
        $event=Event::where('status','published')->where('slug',$this->slug)->with('category')->first();
        return view('livewire.market.events.details',compact('event'))->layout('layouts.market');
    }
}
