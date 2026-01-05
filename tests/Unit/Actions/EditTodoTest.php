<?php

declare(strict_types=1);

use App\Actions\EditTodo;
use App\DTOs\TodoDTO;
use App\Enums\TodoStatus;
use App\Models\Todo;

beforeEach(function () {
    $this->data = TodoDTO::make([
        'title' => 'test',
        'description' => 'description',
        'status' => TodoStatus::COMPLETED,
    ]);
});

it("edit's todo", function (): void {
    $todo = Todo::factory()->create();
    $action = app(EditTodo::class);

    $action->handle($todo, $this->data);

    expect($todo->refresh())
        ->title->toBe($this->data->title)
        ->description->toBe($this->data->description)
        ->status->toBe($this->data->status);
});
