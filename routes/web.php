<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Upload Image Quill
Route::post('/upload-image',[\App\Http\Controllers\FileUploadController::class,'quill_upload_image']);

Route::get('/',\App\Livewire\Market\Index::class)->name('market');
Route::get('/login',\App\Livewire\Market\Login\Index::class)->name('login');

Route::get('/news',\App\Livewire\Market\News\Index::class)->name('news');
Route::get('/categories/{slug}',\App\Livewire\Market\Categories\Index::class)->name('category.details');

Route::get('/faq',\App\Livewire\Market\Faq\Index::class)->name('faq');
Route::get('/posts',\App\Livewire\Market\Speeches\Index::class)->name('posts');
Route::get('/post/{slug}',\App\Livewire\Market\Speeches\Details::class)->name('post.details');

Route::get('/contact',\App\Livewire\Market\Contact\Index::class)->name('contact');
Route::get('/activities',\App\Livewire\Market\Services\Index::class)->name('services');
Route::get('/Activities/{slug}',\App\Livewire\Market\Services\Details::class)->name('service.details');

Route::get('/speeches',\App\Livewire\Market\Speeches\Index::class)->name('speeches');

Route::get('/articles',\App\Livewire\Market\Articles\Index::class)->name('articles');
Route::get('/articles/{slug}',\App\Livewire\Market\Articles\Details::class)->name('article.details');

Route::get('/events',\App\Livewire\Market\Events\Index::class)->name('events');
Route::get('/events/{slug}',\App\Livewire\Market\Events\Details::class)->name('events.details');

Route::get('/about',\App\Livewire\Market\About\Index::class)->name('about');
Route::get('/services',\App\Livewire\Market\Services\Index::class)->name('services');


//Categories
