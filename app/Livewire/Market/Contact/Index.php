<?php

namespace App\Livewire\Market\Contact;

use App\Models\Message;
use App\Models\Setting;
use App\Models\Subscribe;
use Livewire\Component;

class Index extends Component
{
    public $settings=[];
    public function mount()
    {
        $settings=Setting::all();
        $this->settings['email']=$settings->where('key','email')->first()['value'] ?? null;
        $this->settings['facebook']=$settings->where('key','facebook')->first()['value'] ?? null;
        $this->settings['aparat']=$settings->where('key','aparat')->first()['value'] ?? null;
        $this->settings['telegram']=$settings->where('key','telegram')->first()['value'] ?? null;
        $this->settings['whatsapp']=$settings->where('key','whatsapp')->first()['value'] ?? null;
        $this->settings['linkedin']=$settings->where('key','linkedin')->first()['value'] ?? null;
        $this->settings['address']=$settings->where('key','address')->first()['value'] ?? null;
        $this->settings['email']=$settings->where('key','email')->first()['value'] ?? null;
        $this->settings['phone']=$settings->where('key','phone')->first()['value'] ?? null;
        $this->settings['twitter']=$settings->where('key','twitter')->first()['value'] ?? null;
        $this->settings['instagram']=$settings->where('key','instagram')->first()['value'] ?? null;
    }
    public $name;
    public $phone;
    public $message;
    public $email;
    public $successMessage;

    protected $rules = [
        'name' => 'required|min:3',
        'phone' => 'required',
        'message' => 'required|min:5',
    ];

    public function submit()
    {
        $validate=$this->validate();
        Message::create($validate);

        $this->successMessage = "Thank you for reaching out. We'll get back to you soon!";

        // ریست کردن فیلدها
        $this->reset(['name', 'phone', 'message']);
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
    public function render()
    {
        return view('livewire.market.contact.index')->layout('layouts.market');
    }
}
