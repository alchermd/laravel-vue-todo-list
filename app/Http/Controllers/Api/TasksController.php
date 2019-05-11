<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController
{
    public function index()
    {
        return Task::simplePaginate(10, [
            'id',
            'title',
            'description',
            'is_finished',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $task = Task::create([
            'title' => $request->post('title'),
            'description' => $request->post('description'),
            'is_finished' => $request->post('is_finished', false),
        ]);

        return response()->json([
            'id' => $task->id,
            'title' => $task->title,
            'description' => $task->description,
            'is_finished' => $task->is_finished,
        ], 201);
    }

    public function show(Task $task)
    {
        return [
            'id' => $task->id,
            'title' => $task->title,
            'description' => $task->description,
            'is_finished' => $task->is_finished,
        ];
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
