<?php

use App\Http\Controllers\ChickenController;

Route::get('/', function () {
    return redirect()->route('chickens.index');
});

Route::resource('chickens', ChickenController::class);