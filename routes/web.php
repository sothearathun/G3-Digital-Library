<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Library_controller;


// http://127.0.0.1:8000
Route::get('/', [Library_controller::class, 'login_signup_page']);

// http://127.0.0.1:8000/homepage
Route::get('/homepage', [Library_controller::class, 'homepage']);


// for search bar, idk whether u will need it or not (delete it if u dont)
// http://127.0.0.1:8000/search
Route::get('/search', [Library_controller::class, 'search'])->name('books.search');


// http://127.0.0.1:8000/profile
Route::get('/profile', [Library_controller::class, 'profile']);

// http://127.0.0.1:8000/search_page
Route::get('/search_page', [Library_controller::class, 'search_page']);


// http://127.0.0.1:8000/viewbook
Route::get('/viewbook', [Library_controller::class, 'viewbook']);
// accessing the page directly dont work idk why,         
// but u can access it by clicking on any book on 
// 'homepage' -> any book under'Trending book'


// http://127.0.0.1:8000/aboutus
Route::get('/aboutus', [Library_controller::class, 'aboutus']);

// http://127.0.0.1:8000/faq
Route::get('/faq', [Library_controller::class, 'faq']);

// http://127.0.0.1:8000/terms
Route::get('/terms', [Library_controller::class, 'terms_conditions']);

// http://127.0.0.1:8000/pick_genre
Route::get('/pick_genre', [Library_controller::class, 'pick_genre']);

