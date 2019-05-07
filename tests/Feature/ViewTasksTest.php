<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_a_task()
    {
        $task = factory(Task::class)->create();

        $response = $this->json('get', route('tasks.show', ['task' => $task->id]));

        $response->assertJson([
            'title' => $task->title,
            'description' => $task->description,
            'is_finished' => $task->is_finished,
        ]);
    }

    /** @test */
    public function a_user_can_view_a_paginated_set_of_tasks()
    {
        factory(Task::class, 15)->create();

        $pageOne = $this->json('get', route('tasks.index', ['page' => 1]));
        $pageTwo = $this->json('get', route('tasks.index', ['page' => 2]));

        $this->assertCount(10, $pageOne->json('data'));
        $this->assertCount(5, $pageTwo->json('data'));
    }
}
