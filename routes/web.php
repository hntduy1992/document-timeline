<?php

use App\Http\Controllers\Auth\DonViController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('HomePage', []);
});

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login/check', [AuthController::class, 'checkLogin'])->name('checkLogin');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::prefix('don-vi')->group(function () {
        Route::get('/danh-sach', [DonViController::class, 'index'])->name('donvi.index');
        Route::get('/them-moi', [DonViController::class, 'create'])->name('donvi.create');
        Route::get('/{slug}', [DonViController::class, 'edit'])->name('donvi.edit');
        Route::post('/them-moi', [DonViController::class, 'store'])->name('donvi.store');
        Route::put('/{slug}/update', [DonViController::class, 'update'])->name('donvi.update');
        Route::delete('/{slug}/delete', [DonViController::class, 'delete'])->name('donvi.delete');
    });
});
