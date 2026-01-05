<?php

declare(strict_types=1);
use App\Enums\TodoStatus;

beforeEach(function (): void {
    $this->data = [
        'title' => 'test',
        'description' => 'test',
        'status' => TodoStatus::TODO->value,
    ];
});

it("return's correct status code", function (): void {
    $this->post(
        route('todos:store'), $this->data
    )->assertStatus(
        201
    );
});

it("save's todo in database", function (): void {
    $this->post(route('todos:store'), $this->data);

    $this->assertDatabaseHas('todos', $this->data);
});

it("retun's correct data format", function (): void {
    $response = $this->post(route('todos:store', $this->data));

    $response->assertJsonStructure([
        'data' => [
            'title',
            'description',
            'status',
        ],
    ]);
});

test('validation', function (): void {
    $response = $this->post(route('todos:store'));

    $response->assertInvalid([
        'title',
        'description',
        'status',
    ]);
});
