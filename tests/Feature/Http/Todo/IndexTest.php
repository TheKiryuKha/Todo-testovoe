<?php

declare(strict_types=1);

it("return's correct status code", function (): void {
    $this->get(
        route('todos:index')
    )->assertStatus(
        200
    );
});

it("retun's correct data format", function (): void {
    $response = $this->get(route('todos:index'));

    $response->assertJsonStructure([
        'data' => [
            '*' => [
                'title',
                'description',
                'status',
            ],
        ],
    ]);
});
