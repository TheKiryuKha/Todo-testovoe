<?php

declare(strict_types=1);

use App\Enums\TodoStatus;
use App\Models\Todo;

beforeEach(function (): void {
    $this->data = [
        'title' => 'test',
        'description' => 'test',
        'status' => TodoStatus::COMPLETED->value,
    ];
    $this->todo = Todo::factory()->create();
});

it("return's correct status code", function (): void {
    $this->put(
        route('todos:update', $this->todo), $this->data
    )->assertStatus(
        200
    );
});

it('updates todo in database', function (): void {
    $this->put(route('todos:update', $this->todo), $this->data);

    expect($this->todo->refresh())
        ->title->toBe($this->data['title'])
        ->description->toBe($this->data['description'])
        ->status->value->toBe($this->data['status']);
});

test('validation', function (): void {
    $response = $this->put(route('todos:update', $this->todo));

    $response->assertInvalid([
        'title',
        'description',
        'status',
    ]);
});
