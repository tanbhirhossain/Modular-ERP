<?php

use Illuminate\Support\Facades\Route;
use Modules\CORE\Http\Controllers\COREController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('core', COREController::class)->names('core');
});
