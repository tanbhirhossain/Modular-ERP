<?php

use Illuminate\Support\Facades\Route;
use Modules\CORE\Http\Controllers\COREController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('core', COREController::class)->names('core');
});
