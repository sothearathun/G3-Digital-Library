<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;


// BACKEND
// //analytics
// http://127.0.0.1:8000/toAnalytics
Route::get('/', [AdminController::class, 'analytics'])->name('Analytics');

// http://127.0.0.1:8000/publishBookForm
Route::get('/publishBookForm', [AdminController::class, 'publishBookForm'])->name('publishBookForm');
// http://127.0.0.1:8000/processPublish
Route::post('/processPublish', [AdminController::class, 'processPublish'])->name('processPublish');
// http://127.0.0.1:8000/processDeleteBook/{book_id}
Route::match(['get', 'post'], '/processDeleteBook/{book_id}', [AdminController::class, 'processDeleteBook'])->name('processDeleteBook');
// http://127.0.0.1:8000/editBookForm/{book_id}
Route::get('/editBookForm/{book_id}', [AdminController::class, 'editBookForm'])->name('editBookForm');


// http://127.0.0.1:8000/BookPublished
Route::get('/BooksPublished', [AdminController::class, 'booksPublished'])->name('BooksPublished');

// http://127.0.0.1:8000/UserRecords
Route::get('/UsersRecords', [AdminController::class, 'usersRecords'])->name('UsersRecords');
// http://127.0.0.1:8000/Statistics
Route::get('/Statistics', [AdminController::class, 'statistics'])->name('Statistics');

// http://127.0.0.1:8000/Guidelines
Route::get('/Guidelines', [AdminController::class, 'guidelines'])->name('Guidelines');
// Route::post('/updateTermsConditions', [AdminController::class, 'updateTermsConditions'])->name('updateTermsConditions');

// http://127.0.0.1:8000/Author
Route::get('/Authors', [AdminController::class, 'authors'])->name('Authors');


// http://127.0.0.1:8000/publishBookForm
Route::get('/publishNewsForm', [AdminController::class, 'publishNewsForm'])->name('publishNewsForm');
// http://127.0.0.1:8000/processPublish
Route::post('/processPublishNews', [AdminController::class, 'processPublishNews']);
// http://127.0.0.1:8000/DigitalNews
Route::get('/DigitalesNews', [AdminController::class, 'digitalesNews'])->name('DigitalesNews');

Route::match(['get', 'post'],'/deleteNews/{news_id}', [AdminController::class, 'deleteNews'])->name('deleteNews');
Route::get('/editNewsForm/{news_id}', [AdminController::class, 'editNewsForm'])->name('editNewsForm');
