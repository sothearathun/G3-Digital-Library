<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;


// Admin Auth
Route::get('/', [LoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [LoginController::class, 'login'])->name('login');


Route::middleware('auth:admin')->group(function () {
    Route::get('/analytics', [AdminController::class, 'analytics'])->name('Analytics');
    Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/publishBookForm', [AdminController::class, 'publishBookForm'])->name('publishBookForm');
    Route::post('/processPublish', [AdminController::class, 'processPublish'])->name('processPublish');
    Route::match(['get', 'post'], '/processDeleteBook/{book_id}', [AdminController::class, 'processDeleteBook'])->name('processDeleteBook');
    Route::get('/editBookForm/{book_id}', [AdminController::class, 'editBookForm'])->name('editBookForm');
    Route::get('/BooksPublished', [AdminController::class, 'booksPublished'])->name('BooksPublished');
    Route::get('/Statistics', [AdminController::class, 'statistics'])->name('Statistics');
    Route::get('/Guidelines', [AdminController::class, 'guidelines'])->name('Guidelines');
    Route::post('/deleteTC/{tc_id}', [AdminController::class, 'deleteTC'])->name('deleteTC');
    Route::post('/addTC', [AdminController::class, 'addTC'])->name('writeTC');
    Route::post('/deleteFAQ/{faq_id}', [AdminController::class, 'deleteFAQ'])->name('deleteFAQ');
    Route::post('/addFAQ', [AdminController::class, 'addFAQ'])->name('writeFAQ');
    Route::get('/Authors', [AdminController::class, 'authors'])->name('Authors');
    Route::patch('/Authors/{author_id}', [AdminController::class, 'updateAuthorCategory'])->name('updateAuthorCategory');
    Route::get('/publishNewsForm', [AdminController::class, 'publishNewsForm'])->name('publishNewsForm');
    Route::post('/processPublishNews', [AdminController::class, 'processPublishNews']);
    Route::get('/DigitalesNews', [AdminController::class, 'digitalesNews'])->name('DigitalesNews');
    Route::match(['get', 'post'],'/deleteNews/{news_id}', [AdminController::class, 'deleteNews'])->name('deleteNews');
    Route::get('/editNewsForm/{news_id}', [AdminController::class, 'editNewsForm'])->name('editNewsForm');
});
