<?php

namespace App\Services;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

class TodoService
{
    /**
     * Get all todos
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Todo::all();
    }


    /**
     * Create new todo in database
     *
     * @param array $data
     * @return Todo
     */
    public function create(array $data): Todo
    {
        return Todo::create($data);
    }


    /**
     * Update todo
     *
     * @param Todo $todo
     * @param array $data
     * @return Todo
     */
    public function update(Todo $todo, array $data): Todo
    {
        return tap($todo)->update($data);
    }


    /**
     * Delete Todo from database
     *
     * @param Todo $todo
     * @return Todo
     */
    public function delete(Todo $todo): Todo
    {
        return tap($todo)->delete();
    }
}
