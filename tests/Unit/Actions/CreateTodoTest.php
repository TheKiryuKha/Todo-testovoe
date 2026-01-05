<?php

declare(strict_types=1);

use App\Actions\CreateTodo;
use App\DTOs\TodoDTO;
use App\Enums\TodoStatus;
use App\Models\Todo;

beforeEach(function (): void {
    $this->data = TodoDTO::make([
        'title' => 'test',
        'description' => 'description',
        'status' => TodoStatus::TODO,
    ]);
});

it("create's todo", function (): void {
    $action = resolve(CreateTodo::class);

    $action->handle($this->data);

    $this->assertDatabaseHas('todos', $this->data->to_array());
});

it("return's todo", function (): void {
    $action = resolve(CreateTodo::class);

    $todo = $action->handle($this->data);

    expect($todo)->toBeInstanceOf(Todo::class);
});
