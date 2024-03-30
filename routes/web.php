<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Azzarip\AdminPanel\Http\Middleware\AuthenticateSession;

Route::domain('admin.' . env('DOMAIN_BASE'))->middleware([
   'web', AuthenticateSession::class,
])
->group(function () {
    Route::get('/', function() {
        Auth::loginUsingId(1);
        return view('admin-panel::main');
    })->name('admin.dashboard');
    // Route::get('/{panel}', function (string $panel) {
    //     try {

    //         return view('admin-panel.' . $panel);
    //     } catch(\Exception $e) {
    //         abort(404);
    //     }
    // } );
});
