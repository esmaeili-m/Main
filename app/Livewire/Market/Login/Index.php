<?php

namespace App\Livewire\Market\Login;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $email,$password;

    public function submit()
    {
        $credentials = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            return redirect()->route('dashboard');
        }

        $this->addError('password', 'These credentials do not match our records.');
    }
    public function render()
    {
        return view('livewire.market.login.index')->layout('layouts.market');
    }
}
