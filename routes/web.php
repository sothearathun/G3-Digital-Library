<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Library_controller;



Route::get('/', function () {
    return view('welcome');
});

// http://127.0.0.1:8000/index
Route::get('/homepage', [Library_controller::class, 'homepage']);


// for search bar
// http://127.0.0.1:8000/search
Route::get('/search', [Library_controller::class, 'search'])->name('books.search');
