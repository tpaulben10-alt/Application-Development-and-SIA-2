<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChickenOrderController;

Route::get('/chicken-order', [ChickenOrderController::class, 'create']);
Route::post('/chicken-order', [ChickenOrderController::class, 'store']);
