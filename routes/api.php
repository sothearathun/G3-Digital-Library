<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\AuthController;
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

    
    Route::middleware('auth:sanctum')->group(function () {
        // 127.0.0.1:8000/api/logout
        Route::post('/logout', [AuthController::class, 'logout']);
        // 127.0.0.1:8000/api/genres
        Route::post('/genres', [LibraryApiController::class, 'saveGenres']);
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

        // 127.0.0.1:8000/api/terms
        Route::get('/terms', [LibraryApiController::class, 'termsConditions']);
    });

    

    // LibraryApiController.php
        // 127.0.0.1:8000/api/homepage
Route::get('/homepage', [LibraryApiController::class, 'homepage']);
  
// BACKEND

// 127.0.0.1:8000/api/login
Route::post('/login', [AdminApiController::class, 'login']);

    Route::prefix('admin_api')->group(function () {
        // 127.0.0.1:8000/api/admin_api/logout
        Route::post('/logout', [AdminApiController::class, 'logout']);

    // AdminApiController.php - Books and analytics

        // 127.0.0.1:8000/api/admin_api/analytics
        Route::get('/analytics', [AdminApiController::class, 'analytics']);
        // 127.0.0.1:8000/api/admin_api/book-statistics
        Route::get('/book-statistics', [AdminApiController::class, 'bookStatistics']);

        // 127.0.0.1:8000/api/admin_api/books
        Route::get('/books', [AdminApiController::class, 'getAllBooks']);

        // 127.0.0.1:8000/api/admin_api/books/{id}
        Route::get('/books/{id}', [AdminApiController::class, 'getBook']);

        // 127.0.0.1:8000/api/admin_api/createBook
        Route::post('/createBook', [AdminApiController::class, 'createBook']);

        // 127.0.0.1:8000/api/admin_api/updateBook/{id}
        Route::put('/updateBook/{id}', [AdminApiController::class, 'updateBook']);

        // 127.0.0.1:8000/api/admin_api/books/{id}
        Route::delete('/deleteBook/{id}', [AdminApiController::class, 'deleteBook']);

    // AdminApiController.php - News
        // 127.0.0.1:8000/api/admin_api/getAllNews
        Route::get('/getAllNews', [AdminApiController::class, 'getAllNews']);

        // 127.0.0.1:8000/api/admin_api/createNews
        Route::post('/createNews', [AdminApiController::class, 'createNews']);

        // 127.0.0.1:8000/api/admin_api/news/{id}
        Route::put('/updateNews/{id}', [AdminApiController::class, 'updateNews']);

        // 127.0.0.1:8000/api/admin_api/news/{id}
        Route::delete('/news/{id}', [AdminApiController::class, 'deleteNews']);

    // AdminApiController.php - guideline  
        // 127.0.0.1:8000/api/admin_api/addFaq
        Route::post('/addFaq', [AdminApiController::class, 'addFaq']);

        // 127.0.0.1:8000/api/admin_api/delete_faq/{id}
        Route::delete('/delete_faq/{id}', [AdminApiController::class, 'deleteFaq']);

        // 127.0.0.1:8000/api/admin_api/addTerms
            Route::post('/addTerms', [AdminApiController::class, 'addTerms']);

        // 127.0.0.1:8000/api/admin_api/deleteTerms
        Route::delete('/deleteTerms/{id}', [AdminApiController::class, 'deleteTerms']);

        
        Route::post('/testBook', function () {
        return response()->json(['message' => 'Book route reached']);
    });
});
