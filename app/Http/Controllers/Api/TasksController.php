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
        //
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
