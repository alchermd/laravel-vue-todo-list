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
}
