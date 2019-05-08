<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BrowseTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_browse_a_paginated_set_of_tasks()
    {
        factory(Task::class, 15)->create();

        $pageOne = $this->json('get', route('tasks.index', ['page' => 1]));
        $pageTwo = $this->json('get', route('tasks.index', ['page' => 2]));

        $this->assertCount(10, $pageOne->json('data'));
        $this->assertCount(5, $pageTwo->json('data'));
    }
}
