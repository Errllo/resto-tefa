<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\ProdukController;
use App\Http\Controllers\Api\Admin\MejaController;
use App\Http\Controllers\Api\Customer\MenuController;

// Group Route khusus Admin
Route::prefix('admin')->group(function () {
    Route::apiResource('products', ProdukController::class);
    Route::get('tables', [MejaController::class, 'index']);
    Route::post('tables', [MejaController::class, 'store']);
    Route::post('tables/{id}/regenerate-qr', [MejaController::class, 'regenerateQr']);
});

// Group Route khusus Customer (Publik via Scan QR)
Route::prefix('customer')->group(function () {
    Route::get('menu', [MenuController::class, 'index']);
});
