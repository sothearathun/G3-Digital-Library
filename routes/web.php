<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Library_controller;



Route::get('/', function () {
    return view('welcome');
});

// http://127.0.0.1:8000/homepage
Route::get('/homepage', [Library_controller::class, 'homepage']);


// for search bar
// http://127.0.0.1:8000/search
Route::get('/search', [Library_controller::class, 'search'])->name('books.search');





// BACKEND
// //analytics
// http://127.0.0.1:8000/toAnalytics
Route::get('/toAnalytics', [AdminController::class, 'analytics'])->name('admin.analytics');
// http://127.0.0.1:8000/toPublish
Route::get('/toPublish', [AdminController::class, 'publish'])->name('admin.publishs');
// http://127.0.0.1:8000/BookPublished
Route::get('/BookPublished', [AdminController::class, 'bookPublished'])->name('admin.booksPublished');
// http://127.0.0.1:8000/UserRecords
Route::get('/UserRecords', [AdminController::class, 'userRecords'])->name('admin.userRecord');
// http://127.0.0.1:8000/Statistics
Route::get('/Statistics', [AdminController::class, 'statistics'])->name('admin.statistic');
// http://127.0.0.1:8000/Guidelines
Route::get('/Guidelines', [AdminController::class, 'guidelines'])->name('admin.guideline');
// http://127.0.0.1:8000/Author
Route::get('/Author', [AdminController::class, 'author'])->name('admin.authors');
// http://127.0.0.1:8000/DigitalNews
Route::get('/DigitalNews', [AdminController::class, 'digitalNews'])->name('admin.digitalsNews');



// http://127.0.0.1:8000/profile
Route::get('/profile', [Library_controller::class, 'profile']);

// http://127.0.0.1:8000/search_page
Route::get('/search_page', [Library_controller::class, 'search_page']);




    






