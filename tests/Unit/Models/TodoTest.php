<?php

declare(strict_types=1);

use App\Models\Todo;

test('to array', function (): void {
    $todo = Todo::factory()->create()->fresh();

    expect(array_keys($todo->toArray()))
        ->toBe([
            'id',
            'title',
            'description',
            'status',
            'created_at',
            'updated_at',
        ]);
});
