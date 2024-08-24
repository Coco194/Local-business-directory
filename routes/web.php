<?php

use Illuminate\Support\Facades\Route;

Route::get('/create', function () {
    return view('home.index');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/store-address', [App\Http\Controllers\AddressBookController::class, 'store']);