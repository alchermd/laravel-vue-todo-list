<?php

namespace Tests\Feature;

use App\Models\Task;
use Tests\TestCase;

class DeleteTasksTest extends TestCase
{
    /** @test */
    public function a_user_can_delete_a_task()
    {
        $task = factory(Task::class)->create();

        $response = $this->json('delete', route('tasks.destroy', ['task' => $task->id]));

        $response->assertStatus(204);
        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }
}
