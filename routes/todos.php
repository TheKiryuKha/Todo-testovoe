<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', 'index')->name('index');
Route::post('/', 'store')->name('store');
Route::get('/{todo}', 'show')->name('show');
Route::put('/{todo}', 'update')->name('update');
Route::delete('/{todo}', 'destroy')->name('destroy');
