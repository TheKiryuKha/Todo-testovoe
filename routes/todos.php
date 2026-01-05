<?php

declare(strict_types=1);

Route::get('/', 'index')->name('index');
Route::get('/{todo}', 'show')->name('show');
