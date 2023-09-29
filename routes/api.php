<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Product\ProductController;
use App\Http\Controllers\Api\Product\CategoryController;
use App\Http\Controllers\Api\Product\ColorController;
use App\Http\Controllers\Api\Product\SizeController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('products')->group(function() {

    Route::get('/', [ProductController::class, 'index']);
    Route::get('/show/{slug}', [ProductController::class, 'getBySlug']);

    Route::prefix('categories')->group(function() {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('/{slug}', [CategoryController::class, 'getBySlug']);
    });

    Route::prefix('colors')->group(function() {
        Route::get('/', [ColorController::class, 'index']);
    });

    Route::prefix('sizes')->group(function() {
        Route::get('/', [SizeController::class, 'index']);
    });

});
