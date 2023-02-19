<?php

namespace Tests\Feature;

use App\Models\Task;
use Carbon\Carbon;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_api_response(): void
    {
        $response = $this->getJson('/api/tasks');

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => true,
            ]);
    }

    public function test_api_create_task(): void
    {
        $task = [
            'name' => rand(),
            'description' => rand(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        $this->postJson('/api/tasks', $task)
            ->assertStatus(201)
            ->assertJson([
                'status' => true,
            ]);
    }

    public function test_api_update_task(): void
    {
        $task = Task::create([
            'name' => rand(),
            'description' => rand(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $updatedTask = [
            'name' => 'testName',
            'description' => 'testDesc',
            'updated_at' => Carbon::now()
        ];

        $this->putJson('/api/tasks/' . $task->id, $updatedTask)
            ->assertStatus(200)
            ->assertJson([
                'status' => true,
            ]);
    }

    public function test_api_show_task(): void
    {
        $task = Task::create([
            'name' => rand(),
            'description' => rand(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $this->getJson('/api/tasks/' . $task->id)
            ->assertStatus(200)
            ->assertJson([
                'status' => true,
            ]);
    }

    public function test_api_delete_task(): void
    {
        $task = Task::create([
            'name' => rand(),
            'description' => rand(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $this->deleteJson('/api/tasks/' . $task->id)
            ->assertStatus(200)
            ->assertJson([
                'status' => true,
            ]);
    }
}
