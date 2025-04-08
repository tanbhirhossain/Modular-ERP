<?php

use Illuminate\Support\Facades\Route;
use Modules\HRM\Http\Controllers\HRMController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('hrm', HRMController::class)->names('hrm');
});
