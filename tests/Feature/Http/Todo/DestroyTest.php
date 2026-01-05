<?php

declare(strict_types=1);
use App\Models\Todo;

it("return's correct status code", function (): void {
    $this->delete(
        route('todos:destroy', Todo::factory()->create())
    )->assertStatus(
        204
    );
});

it("delete's todo", function () {
    $todo = Todo::factory()->create();

    $this->delete(route('todos:destroy', $todo));

    $this->assertDatabaseEmpty('todos');
});
