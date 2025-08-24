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

Route::get('/', function () {
    return view('welcome');
});
//Upload Image Quill
Route::post('/upload-image',[\App\Http\Controllers\FileUploadController::class,'quill_upload_image']);


//Categories
Route::get('categories',\App\Livewire\Dashboard\Categories\Index::class)->name('categories.list');
