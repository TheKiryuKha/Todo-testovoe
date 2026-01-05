<?php

declare(strict_types=1);
use App\Models\Todo;

it("return's correct status code", function (): void {
    $this->get(
        route('todos:show', Todo::factory()->create())
    )->assertStatus(
        200
    );
});

it("retun's correct data format", function (): void {
    $todo = Todo::factory()->create();

    $response = $this->get(route('todos:show', $todo));

    $response->assertJsonStructure([
        'data' => [
            'title',
            'description',
            'status',
        ],
    ]);
});
