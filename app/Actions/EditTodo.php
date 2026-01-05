<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\TodoDTO;
use App\Models\Todo;

final readonly class EditTodo
{
    public function handle(Todo $todo, TodoDTO $dto): void
    {
        $todo->update($dto->to_array());
    }
}
