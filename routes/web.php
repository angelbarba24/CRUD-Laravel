<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('cars', App\Http\Controllers\CarController::class)->except('create', 'edit', 'show');


Route::resource('cars', App\Http\Controllers\CarController::class)->except('show');


Route::resource('cars', App\Http\Controllers\CarController::class)->except('show');


Route::resource('cars', App\Http\Controllers\CarController::class)->except('show');
