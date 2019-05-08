<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_task()
    {
        $task = factory(Task::class)->make();
        $taskAttributes = [
            'title' => $task->title,
            'description' => $task->description,
            'is_finished' => $task->is_finished,
        ];

        $response = $this->json('post', route('tasks.store'), $taskAttributes);

        $response->assertStatus(201);
        $response->assertJson($taskAttributes);
        $this->assertDatabaseHas('tasks', $taskAttributes);
    }
}
