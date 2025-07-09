<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Frontend\LibraryApiController;
use App\Http\Controllers\Backend\AdminApiController;

// frontend
    // AuthController.php - login/signup
    Route::middleware(['guest'])->group(function () {
        // 127.0.0.1:8000
        Route::get('/', [AuthController::class, 'showLogin'])->name('login');

        // 127.0.0.1:8000/api/processLogin
        Route::post('/processLogin', [AuthController::class, 'login']);

        // 127.0.0.1:8000/api/signup
        Route::get('/signup', [AuthController::class, 'signup'])->name('signup');

        // 127.0.0.1:8000/api/processSignup
        Route::post('/processSignup', [AuthController::class, 'signup'])->name('processSignup');
        
        // // 127.0.0.1:8000/api/logout
        // Route::post('/logout', [AuthController::class, 'logout']);
    });

    // 127.0.0.1:8000/api/logout
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
    });

    // 127.0.0.1:8000/api/genres
    Route::middleware('auth:sanctum')->post('/genres', [LibraryApiController::class, 'saveGenres']);

    // 127.0.0.1:8000/api/analytics
    Route::get('/analytics', [AdminApiController::class, 'analytics']);
    // 127.0.0.1:8000/api/book-statistics
    Route::get('/book-statistics', [AdminApiController::class, 'bookStatistics']);


    // LibraryApiController.php
        // 127.0.0.1:8000/api/homepage
        Route::get('/homepage', [LibraryApiController::class, 'homepage']);

        // 127.0.0.1:8000/api/search
        Route::get('/search', [LibraryApiController::class, 'search']);

        // 127.0.0.1:8000/api/viewbook/{book_id}
        Route::get('/viewbook/{book_id}', [LibraryApiController::class, 'viewBook']);

        // 127.0.0.1:8000/api/readbook/{book_id}
        Route::get('/readbook/{book_id}', [LibraryApiController::class, 'readBook']);

        // 127.0.0.1:8000/api/progress
        Route::post('/progress', [LibraryApiController::class, 'storeReadingProgress']);

        // 127.0.0.1:8000/api/faqs
        Route::get('/faqs', [LibraryApiController::class, 'faq']);

        // 127.0.0.1:8000/api/addFaq
        Route::post('/addFaq', [LibraryApiController::class, 'addFaq']);

        // 127.0.0.1:8000/api/delete_faq/{id}
        Route::delete('/delete_faq/{id}', [LibraryApiController::class, 'deleteFaq']);

        // 127.0.0.1:8000/api/terms
        Route::get('/terms', [LibraryApiController::class, 'termsConditions']);

        // 127.0.0.1:8000/api/addTerms
        Route::post('/addTerms', [LibraryApiController::class, 'addTerms']);

        // 127.0.0.1:8000/api/deleteTerms
        Route::delete('/deleteTerms/{id}', [LibraryApiController::class, 'deleteTerms']);

// BACKEND
  // AdminApiController.php - Books
    // 127.0.0.1:8000/api/books
    Route::get('/books', [AdminApiController::class, 'getAllBooks']);

    // 127.0.0.1:8000/api/books/{id}
    Route::get('/books/{id}', [AdminApiController::class, 'getBook']);

    // 127.0.0.1:8000/api/createBook
    Route::post('/createBook', [AdminApiController::class, 'createBook']);

    // 127.0.0.1:8000/api/updateBook/{id}
    Route::put('/updateBook/{id}', [AdminApiController::class, 'updateBook']);

    // 127.0.0.1:8000/api/books/{id}
    Route::delete('/deleteBook/{id}', [AdminApiController::class, 'deleteBook']);

  // AdminApiController.php - News
    // 127.0.0.1:8000/api/getAllNews
    Route::get('/getAllNews', [AdminApiController::class, 'getAllNews']);

    // 127.0.0.1:8000/api/createNews
    Route::post('/createNews', [AdminApiController::class, 'createNews']);

    // 127.0.0.1:8000/api/news/{id}
    Route::put('/updateNews/{id}', [AdminApiController::class, 'updateNews']);

    // 127.0.0.1:8000/api/news/{id}
    Route::delete('/news/{id}', [AdminApiController::class, 'deleteNews']);
    
    
    Route::post('/testBook', function () {
    return response()->json(['message' => 'Book route reached']);
});
