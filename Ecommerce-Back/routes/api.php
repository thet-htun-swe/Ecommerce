<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('category', [ApiController::class, 'showCategory']);
Route::get('watch', [ApiController::class, 'showWatch']);
