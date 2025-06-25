<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Library_controller;



Route::get('/', function () {
    return view('welcome');
});

// http://127.0.0.1:8000/homepage
Route::get('/homepage', [Library_controller::class, 'homepage'])->name('homepage');


// for search bar
// http://127.0.0.1:8000/search
Route::get('/search', [Library_controller::class, 'search'])->name('books.search');


// http://127.0.0.1:8000/profile
Route::get('/profile', [Library_controller::class, 'profile']);

// http://127.0.0.1:8000/search_page
Route::get('/search_page', [Library_controller::class, 'search_page'])->name('search_page');


// http://127.0.0.1:8000/viewbook/{book_id}
Route::get('/viewbook/{book_id}', [Library_controller::class, 'viewbook'])->name('viewbook');
// http://127.0.0.1:8000/readbook/{book_id}
Route::get('/readbook/{book_id}', [Library_controller::class, 'readbook'])->name('readbook');
// http://127.0.0.1:8000/readbook/{book_id}
Route::match(['get', 'post'], '/storeReadingProgress', [Library_controller::class, 'storeReadingProgress'])->name('storeReadingProgress');

// http://127.0.0.1:8000/aboutus
Route::get('/aboutus', [Library_controller::class, 'aboutus'])->name('aboutus');

// http://127.0.0.1:8000/faq
Route::get('/faq', [Library_controller::class, 'faq']);

// http://127.0.0.1:8000/terms
Route::get('/terms', [Library_controller::class, 'terms_conditions']);






