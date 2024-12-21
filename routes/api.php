<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/category', [App\Http\Controllers\Category\CategoryController::class, 'getCategories']);
Route::get('/cities', [App\Http\Controllers\Location\LocationController::class, 'getCities']);
Route::post('/create-job-post', [App\Http\Controllers\JobPost\JobPostController::class, 'createJobPost']);
Route::get('/job-posts', [App\Http\Controllers\JobPost\JobPostController::class, 'index']);