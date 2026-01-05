<?php

declare(strict_types=1);

Route::get('/', 'index')->name('index');
Route::post('/', 'store')->name('store');
Route::get('/{todo}', 'show')->name('show');
Route::put('/{todo}', 'update')->name('update');
