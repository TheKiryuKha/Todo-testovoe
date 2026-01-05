<?php

declare(strict_types=1);

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::prefix('todos')
    ->as('todos:')
    ->controller(TodoController::class)
    ->group(base_path('routes/todos.php'));
