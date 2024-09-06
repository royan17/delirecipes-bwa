<?php

use App\Http\Controllers\Api\CatergoryController;
use App\Http\Controllers\Api\RecipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/category/{category:slug}', [CatergoryController::class, 'show']);
Route::apiResource('/categories', CatergoryController::class);

Route::get('/recipe/{recipe:slug}', [RecipeController::class, 'show']);
Route::apiResource('/recipes', RecipeController::class);
