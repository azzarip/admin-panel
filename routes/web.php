<?php

use Azzarip\AdminPanel\Http\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Route;

Route::domain(adminUrl())->middleware([
    'web', 'auth:sanctum', AuthenticateSession::class, 'verified',
])
->group(function () {
    Route::view('/', 'dashboard')->name('dashboard');
});
