<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\DTOs\TodoDTO;
use App\Enums\TodoStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class CreateTodoRequest extends FormRequest
{
    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:1', 'max:10'],
            'description' => ['required', 'string', 'min:1', 'max:50'],
            'status' => ['required', Rule::enum(TodoStatus::class)],
        ];
    }

    public function toDto(): TodoDTO
    {
        return TodoDTO::make([
            'title' => $this->string('title')->value(),
            'description' => $this->string('description')->value(),
            'status' => TodoStatus::from($this->string('status')->value()),
        ]);
    }
}
