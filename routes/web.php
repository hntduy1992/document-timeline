<?php

use App\Http\Controllers\VanBanController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('HomePage', []);
});

Route::get('/dashboard',function (){
   return Inertia::render('Auth/DashboardPage',[]);
});
Route::prefix('van-ban')->group(function (){
    Route::get('/', [VanBanController::class, 'index'])->name('van-ban.index');
    Route::post('/', [VanBanController::class,'store']);
    Route::get('/them-moi', [VanBanController::class,'create'])->name('van-ban.create');
});

