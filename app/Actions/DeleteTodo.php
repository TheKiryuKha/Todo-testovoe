<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Todo;

final readonly class DeleteTodo
{
    public function handle(Todo $todo): void
    {
        $todo->delete();
    }
}
