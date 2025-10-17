<?php

namespace App\Livewire\Market\Configs;

use App\Models\Setting;
use Livewire\Component;

class Footer extends Component
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
    public function render()
    {
        return view('livewire.market.configs.footer');
    }
}
