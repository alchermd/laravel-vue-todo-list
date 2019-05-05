<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/tasks/{task}', function (Task $task) {
    return [
        'id' => $task->id,
        'title' => $task->title,
        'description' => $task->description,
        'is_finished' => $task->is_finished,
    ];
});
