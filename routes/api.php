<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Auth Routes
Route::middleware('auth:sanctum')->group(function() {
    Route::post('/post-comment', [App\Http\Controllers\JobPost\JobPostController::class, 'postComment']);
    Route::post('/create-job-post', [App\Http\Controllers\JobPost\JobPostController::class, 'createJobPost']);
    
});

// Public routes
Route::get('/comments/{id}', [App\Http\Controllers\JobPost\JobPostController::class, 'comments']);
Route::get('/category', [App\Http\Controllers\Category\CategoryController::class, 'getCategories']);
Route::get('/cities', [App\Http\Controllers\Location\LocationController::class, 'getCities']);
Route::get('/job-posts', [App\Http\Controllers\JobPost\JobPostController::class, 'index']);
Route::get('/job-post/{id}', [App\Http\Controllers\JobPost\JobPostController::class, 'showJobPost']);

Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

