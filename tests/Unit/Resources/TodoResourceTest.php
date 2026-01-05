<?php

declare(strict_types=1);
use App\Http\Resources\TodoResource;
use App\Models\Todo;

test('to array', function (): void {
    $todo = Todo::factory()->create();
    $resource = new TodoResource($todo);

    $array = $resource->toArray(request());

    expect($array)->toBe([
        'title' => $todo->title,
        'description' => $todo->description,
        'status' => $todo->status,
    ]);
});
