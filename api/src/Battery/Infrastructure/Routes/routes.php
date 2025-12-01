<?php

declare(strict_types=1);

use Domain\Battery\Infrastructure\Http\Controller\BatteryController;
use Illuminate\Support\Facades\Route;

Route::prefix('/api')->group(function () {
    Route::get('/', [BatteryController::class, 'status']);
    Route::post('/ping', [BatteryController::class, 'saveBatteryStatus']);
});

