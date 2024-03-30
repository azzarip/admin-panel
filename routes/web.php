<?php

use Azzarip\AdminPanel\Http\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Route;

Route::domain('admin.' . env('DOMAIN_BASE'))->middleware([
    'web', 'auth:sanctum', AuthenticateSession::class,
])
->group(function () {
    Route::view('/', 'admin-panel::dashboard')->name('admin.dashboard');
});
