<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminAuth;

Route::get('/admin/login', [AuthController::class, 'showLogin']);
Route::post('/admin/login', [AuthController::class, 'postLogin']);
Route::get('/admin/logout', [AuthController::class, 'logout']);

Route::prefix('admin')->middleware([AdminAuth::class])->group(function () {
    Route::get('/', [AdminController::class, 'home']);
    Route::resource('category', CategoryController::class);
    Route::resource('watch', WatchController::class);
});
