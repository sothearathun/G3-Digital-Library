<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;


// BACKEND
// //analytics
// http://127.0.0.1:8000/toAnalytics
Route::get('/toAnalytics', [AdminController::class, 'analytics'])->name('admin.analytics');

// http://127.0.0.1:8000/publishBookForm
Route::get('/publishBookForm', [AdminController::class, 'publishBookForm'])->name('admin.publish');
// http://127.0.0.1:8000/processPublish
Route::post('/processPublish', [AdminController::class, 'processPublish']);

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