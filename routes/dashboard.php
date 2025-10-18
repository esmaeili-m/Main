<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function (){
    Route::get('/panel',\App\Livewire\Dashboard\Index::class)->name('dashboard');

    Route::get('categories',\App\Livewire\Dashboard\Categories\Index::class)->name('categories.list');

    Route::get('categories/trash',\App\Livewire\Dashboard\Categories\Trash::class)->name('categories.trash');


    Route::get('posts',\App\Livewire\Dashboard\Post\Index::class)->name('posts.list');

    Route::get('articles',\App\Livewire\Dashboard\Articles\Index::class)->name('articles.list');

    Route::get('events',\App\Livewire\Dashboard\Events\Index::class)->name('events.list');

    Route::get('comments',\App\Livewire\Dashboard\Comments\Index::class)->name('comments.list');

    Route::get('tags',\App\Livewire\Dashboard\Tags\Index::class)->name('tags.list');

    Route::get('faqs',\App\Livewire\Dashboard\Faq\Index::class)->name('faqs.list');

    Route::get('settings',\App\Livewire\Dashboard\Settings\Index::class)->name('settings.list');

    Route::get('messages',\App\Livewire\Dashboard\Messages\Index::class)->name('messages.list');

    Route::get('sliders',\App\Livewire\Dashboard\Slider\Index::class)->name('sliders.list');

    Route::get('services',\App\Livewire\Dashboard\Services\Index::class)->name('services.list');
});

