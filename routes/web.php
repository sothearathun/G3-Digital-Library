<?php

use App\Http\Controllers\BackendController;
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





// BACKEND
// //analytics
// http://127.0.0.1:8000/toAnalytics
Route::get('/toAnalytics', [BackendController::class, 'analytics'])->name('backend.analytics');
// http://127.0.0.1:8000/toPublish
Route::get('/toPublish', [BackendController::class, 'publish'])->name('backend.publish');
// http://127.0.0.1:8000/BookPublished
Route::get('/BookPublished', [BackendController::class, 'bookPublished'])->name('backend.bookPublished');
// http://127.0.0.1:8000/UserRecords
Route::get('/UserRecords', [BackendController::class, 'userRecords'])->name('backend.userRecords');
// http://127.0.0.1:8000/Statistics
Route::get('/Statistics', [BackendController::class, 'statistics'])->name('backend.statistics');
// http://127.0.0.1:8000/Guidelines
Route::get('/Guidelines', [BackendController::class, 'guidelines'])->name('backend.guidelines');
// http://127.0.0.1:8000/Author
Route::get('/Author', [BackendController::class, 'author'])->name('backend.author');
// http://127.0.0.1:8000/DigitalNews
Route::get('/DigitalNews', [BackendController::class, 'digitalNews'])->name('backend.digitalNews');



// http://127.0.0.1:8000/profile
Route::get('/profile', [Library_controller::class, 'profile']);

// http://127.0.0.1:8000/search_page
Route::get('/search_page', [Library_controller::class, 'search_page']);




    






