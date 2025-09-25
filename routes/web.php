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
Route::get('/them-van-ban', [VanBanController::class,'create']);
Route::post('/them-van-ban', [VanBanController::class,'store']);
