<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/{id}', [ItemController::class, 'show']);

Route::get('/admin', [ItemController::class, 'admin']);
Route::get('/admin/create', [ItemController::class, 'create']);
Route::post('/admin/store', [ItemController::class, 'store']);
Route::get('/admin/edit/{id}', [ItemController::class, 'edit']);
Route::post('/admin/update/{id}', [ItemController::class, 'update']);
Route::get('/admin/delete/{id}', [ItemController::class, 'delete']);