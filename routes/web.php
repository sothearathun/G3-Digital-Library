<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Library_controller;



// Route::get('/', function () {
//     return view('welcome');
// });

// http://127.0.0.1:8000/homepage
Route::get('/homepage', [Library_controller::class, 'homepage']);


// for search bar
// http://127.0.0.1:8000/search
Route::get('/search', [Library_controller::class, 'search'])->name('books.search');


// http://127.0.0.1:8000/profile
Route::get('/profile', [Library_controller::class, 'profile']);

// http://127.0.0.1:8000/search_page
Route::get('/search_page', [Library_controller::class, 'search_page']);




    






