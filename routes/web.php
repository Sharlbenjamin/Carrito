<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('enums', [App\Http\Controllers\EnumsIndex::class, 'index'])->name('enums');

Route::resource('cars', App\Http\Controllers\CarController::class);

Route::resource('brands', App\Http\Controllers\BrandController::class)->except('index', 'show', 'destroy');

Route::resource('types', App\Http\Controllers\TypeController::class)->except('index', 'show', 'destroy');

Route::resource('parts', App\Http\Controllers\PartController::class)->except('index', 'show', 'destroy');

Route::resource('repairs', App\Http\Controllers\RepairController::class)->except('index', 'show');

Route::resource('repair-parts', App\Http\Controllers\RepairPartController::class)->except('index', 'show');

Route::resource('agencies', App\Http\Controllers\AgencyController::class)->except('show');
