<?php

namespace App\Livewire\Market;

use App\Models\Message;
use App\Models\Setting;
use Livewire\Component;
use Stevebauman\Location\Facades\Location;

class Index extends Component
{
    public $settings=[];
    public $name,$phone,$message;
    public function mount()
    {
        $settings=Setting::all();
        $this->settings['phone']=$settings->where('key','phone')->first()['value'] ?? null;
    }

    public function save_message()
    {
        $validate=$this->validate([
           'name'=>'required',
           'phone'=>'required|regex:/^\+?[0-9]{10,15}$/',
           'message'=>'required',
        ]);
        $validate['info'] = Location::get();
        Message::create($validate);
        session()->flash('message','Your message was sent successfully.');
        $this->reset(['name','phone','message']);

    }
    public function render()
    {
        return view('livewire.market.index')->layout('layouts.market');
    }
}
