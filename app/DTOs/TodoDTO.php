<?php

declare(strict_types=1);

namespace App\DTOs;

use App\Enums\TodoStatus;

final readonly class TodoDTO
{
    public function __construct(
        public string $title,
        public string $description,
        public TodoStatus $status
    ) {}

    /**
     * @param array{
     * title: string,
     * description: string,
     * status: TodoStatus
     * } $attr
     */
    public static function make(array $attr): self
    {
        return new self(
            title: $attr['title'],
            description: $attr['description'],
            status: $attr['status'],
        );
    }

    /**
     * @return array{
     * title: string,
     * description: string,
     * status: TodoStatus
     * }
     */
    public function to_array(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
        ];
    }
}
