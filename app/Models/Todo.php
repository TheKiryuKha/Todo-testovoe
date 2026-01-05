<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\TodoStatus;
use Carbon\CarbonInterface;
use Database\Factories\TodoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property-read string $title
 * @property-read string $description
 * @property-read TodoStatus $status
 * @property-read CarbonInterface $created_at
 * @property-read CarbonInterface $updated_at
 */
final class Todo extends Model
{
    /** @use HasFactory<TodoFactory> */
    use HasFactory;

    /**
     * @return string[]
     */
    public function casts(): array
    {
        return [
            'status' => TodoStatus::class,
        ];
    }
}
