<?php

namespace App\Livewire\Dashboard\Configs;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.dashboard.configs.header');
    }
}
