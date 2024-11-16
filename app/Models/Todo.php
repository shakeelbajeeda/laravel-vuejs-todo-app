<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'task',
        'description',
        'is_completed'
    ];


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_completed' => 'boolean'
        ];
    }


    protected function isCompleted(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? "Completed" : "Pending",
        );
    }
}
