<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Services\TodoService;
use Illuminate\Http\JsonResponse;

class TodoController extends Controller
{

    public function __construct(protected TodoService $todoService)
    {
    }

    /**
     * Display a listing of the Todos.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->respond(data: $this->todoService->getAll());
    }

    /**
     * Store a newly created todo in storage.
     *
     * @param TodoRequest $request
     * @return JsonResponse
     */
    public function store(TodoRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $todo = $this->todoService->create($validated);

        return $this->respond(message: 'Todo created successfully.', data: $todo);
    }

    /**
     * Display the specified todo.
     *
     * @param Todo $todo
     * @return JsonResponse
     */
    public function show(Todo $todo): JsonResponse
    {
        return $this->respond(data: $todo);
    }

    /**
     * Update the specified todo in storage.
     *
     * @param TodoRequest $request
     * @param Todo $todo
     * @return JsonResponse
     */
    public function update(TodoRequest $request, Todo $todo): JsonResponse
    {
        $validated = $request->validated();
        $todo = $this->todoService->update($todo, $validated);

        return $this->respond(message: 'Todo updated successfully.', data: $todo);
    }

    /**
     * Remove the specified todo from storage.
     *
     * @param Todo $todo
     * @return JsonResponse
     */
    public function destroy(Todo $todo): JsonResponse
    {
        return $this->respond(message: 'Todo deleted successfully.', data: $this->todoService->delete($todo));
    }
}
