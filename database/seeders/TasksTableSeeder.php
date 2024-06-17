<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory()->create([
            'name' => 'Estudar PHP',
            'complete' => false
        ]);

        Task::factory()->create([
            'name' => 'Estudar Javascrit',
            'complete' => false
        ]);

        Task::factory()->create([
            'name' => 'Estudar Laravel',
            'complete' => false
        ]);
    }
}
