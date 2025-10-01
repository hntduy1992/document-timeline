<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('HomePage', []);
});
Route::get('/messages', function () {
    return Inertia::render('MessagesPage', []);
});
Route::get('/profile', function () {
    return Inertia::render('ProfilePage', []);
});

Route::middleware('auth')->group(function () {
    Route::get('/updates', function () {
        return Inertia::render('UpdatesPage', []);
    });
});

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login/check', [AuthController::class, 'checkLogin'])->name('checkLogin');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


