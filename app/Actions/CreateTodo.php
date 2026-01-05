<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\TodoDTO;
use App\Models\Todo;

final readonly class CreateTodo
{
    public function handle(TodoDTO $dto): Todo
    {
        return Todo::query()->create($dto->to_array());
    }
}
