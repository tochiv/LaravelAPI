<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $tasks = Task::all();

        return response()->json([
            'status' => true,
            'tasks' => $tasks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request): JsonResponse
    {
        $task = Task::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Task Created successfully!",
            'task' => $task
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): JsonResponse
    {
        return response()->json([
            'status' => true,
            'task' => $task
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $request, Task $task): JsonResponse
    {
        $task->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Post Updated successfully!",
            'task' => $task
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): JsonResponse
    {
        $task->delete();

        return response()->json([
            'status' => true,
            'message' => "Task Deleted successfully!"
        ], 200);
    }
}
