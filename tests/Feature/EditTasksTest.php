<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_edit_a_task()
    {
        $task = factory(Task::class)->create();
        $taskAttributes = [
            'title' => 'New Title',
            'description' => 'New Description',
            'is_finished' => ! $task->is_finished,
        ];

        $response = $this->json('put', route('tasks.update', ['task' => $task->id]), $taskAttributes);

        $response->assertStatus(200);
        $response->assertJson($taskAttributes);
        $this->assertDatabaseHas('tasks', $taskAttributes);
    }
}
