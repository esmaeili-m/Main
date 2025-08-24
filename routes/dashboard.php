<?php

use Illuminate\Support\Facades\Route;



Route::get('/panel',\App\Livewire\Dashboard\Index::class)->name('dashboard');
