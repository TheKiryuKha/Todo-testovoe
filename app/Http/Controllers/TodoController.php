<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final readonly class TodoController
{
    public function index(): AnonymousResourceCollection
    {
        $todos = Todo::all();

        return TodoResource::collection($todos);
    }

    public function show(Todo $todo): TodoResource
    {
        return new TodoResource($todo);
    }
}
