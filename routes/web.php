<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Library_controller;
use App\Http\Controllers\Auth\AuthController;


route::post('/processLogout', [AuthController::class, 'logout'])->name('processLogout');

Route::middleware(['guest'])->group(function () {
    route::get('/', [AuthController::class, 'showLogin'])->name('login');
    route::post('/processLogin', [AuthController::class, 'login'])->name('processLogin');

    route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
    route::post('/processSignup', [AuthController::class, 'signup'])->name('processSignup');
});

// http://127.0.0.1:8000/homepage
Route::get('/home', [Library_controller::class, 'homepage'])->name('homepage');
// http://127.0.0.1:8000/aboutus
Route::get('/aboutus', [Library_controller::class, 'aboutus'])->name('aboutus');

Route::middleware(['auth'])->controller(Library_controller::class)->group(function () {
    // http://127.0.0.1:8000/profile
    Route::get('/profile', 'profile')->name('profile');
    // http://127.0.0.1:8000/search_page
    Route::get('/search_page','search_page')->name('search_page');
    // http://127.0.0.1:8000/viewbook/{book_id}
    Route::get('/viewbook/{book_id}','viewbook')->name('viewbook')->middleware('auth');
    // http://127.0.0.1:8000/readbook/{book_id}
    Route::get('/readbook/{book_id}','readbook')->name('readbook');
    // http://127.0.0.1:8000/readbook/{book_id}
    Route::match(['get', 'post'], '/storeReadingProgress', 'storeReadingProgress')->name('storeReadingProgress');
    // http://127.0.0.1:8000/faq
    Route::get('/faq', 'faq')->name('faq');
    // http://127.0.0.1:8000/terms
    Route::get('/terms', 'terms_conditions')->name('terms_conditions');

});






