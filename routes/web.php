<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Library_controller;
use App\Http\Controllers\Auth\AuthController;

// Guest routes (login/signup)
Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/processLogin', [AuthController::class, 'login'])->name('processLogin');
    Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
    Route::post('/processSignup', [AuthController::class, 'signup'])->name('processSignup');
});

// Public routes (accessible without authentication)
Route::get('/home', [Library_controller::class, 'homepage'])->name('homepage');
Route::get('/aboutus', [Library_controller::class, 'aboutus'])->name('aboutus');

// Protected routes (require authentication)
Route::middleware(['auth'])->group(function () {
    // Logout route
    Route::post('/processLogout', [AuthController::class, 'logout'])->name('processLogout');
    
    // Library controller routes
    Route::controller(Library_controller::class)->group(function () {
        Route::get('/profile/{user_id}', 'profile')->name('profile');
        Route::get('/search_page', 'search_page')->name('search_page');
        Route::get('/search_page/results', 'processSearch')->name('processSearch');
        Route::get('/viewbook/{book_id}', 'viewbook')->name('viewbook');
        Route::post('/addfavorite/{book_id}', 'addfavorite')->name('addfavorite');
        Route::post('/writeComment/{book_id}', 'writeComment')->name('writeComment');
        Route::post('/ratings/{book_id}', 'ratings')->name('ratings');
        Route::get('/readbook/{book_id}', 'readbook')->name('readbook');
        Route::post('/storeReadingProgress', 'storeReadingProgress')->name('storeReadingProgress');
        Route::get('/faq', 'faq')->name('faq');
        Route::get('/terms', 'terms_conditions')->name('terms_conditions');
    });
});