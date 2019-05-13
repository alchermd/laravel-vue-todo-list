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

    /** @test */
    public function the_title_field_is_required()
    {
        $task = factory(Task::class)->make();
        $taskAttributes = [
            'description' => $task->description,
            'is_finished' => $task->is_finished,
        ];

        $response = $this->json('post', route('tasks.store'), $taskAttributes);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['title']);
    }

    /** @test */
    public function the_description_field_is_required()
    {
        $task = factory(Task::class)->make();
        $taskAttributes = [
            'title' => $task->title,
            'is_finished' => $task->is_finished,
        ];

        $response = $this->json('post', route('tasks.store'), $taskAttributes);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['description']);
    }

    /** @test */
    public function the_is_finished_field_is_not_required_and_defaults_to_false()
    {
        $task = factory(Task::class)->make();
        $taskAttributes = [
            'title' => $task->title,
            'description' => $task->description,
        ];

        $response = $this->json('post', route('tasks.store'), $taskAttributes);

        $response->assertStatus(201);
        $this->assertFalse($response->json('is_finished'));
    }
}
