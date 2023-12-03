<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            Task::create([
                'title' => "Task $i",
                'description' => "Description for Task $i",
                'due_date' => Carbon::now()->addDays($i),
                'status' => $i % 2 == 0 ? 'completed' : 'pending',
            ]);
        }
    }
}
