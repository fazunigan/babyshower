<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('/babyshowers', 'App\Http\Controllers\BabyshowerController')
    ->middleware(['auth:sanctum', 'verified'])
    ->except('store');

Route::post('/babyshowers', 'App\Http\Controllers\BabyshowerController@store')->name('babyshowers.store');
Route::get('/share/{id}','App\Http\Controllers\BabyOperationsController@share')->name('share');
Route::get('/edit/{id}','App\Http\Controllers\BabyOperationsController@edit')->name('edit');