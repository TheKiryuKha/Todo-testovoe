<?php

declare(strict_types=1);

use App\Actions\DeleteTodo;
use App\Models\Todo;

it("delete's todo", function (): void {
    $todo = Todo::factory()->create();
    $action = app(DeleteTodo::class);

    $action->handle($todo);

    $this->assertDatabaseEmpty('todos');
});
