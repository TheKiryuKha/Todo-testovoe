<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateTodo;
use App\Actions\EditTodo;
use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\EditTodoRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final readonly class TodoController
{
    public function index(): AnonymousResourceCollection
    {
        $todos = Todo::all();

        return TodoResource::collection($todos);
    }

    public function store(CreateTodoRequest $request, CreateTodo $action): TodoResource
    {
        $todo = $action->handle($request->toDto());

        return new TodoResource($todo);
    }

    public function show(Todo $todo): TodoResource
    {
        return new TodoResource($todo);
    }

    public function update(Todo $todo, EditTodoRequest $request, EditTodo $action): JsonResponse
    {
        $action->handle($todo, $request->toDto());

        return response()->json(status: 200);
    }
}
