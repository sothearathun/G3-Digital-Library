<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/dashboard', function () {
    return 'Welcome to the admin dashboard!';
});