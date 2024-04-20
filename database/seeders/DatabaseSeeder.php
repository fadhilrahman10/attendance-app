<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\WorkDaysEmployee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        WorkDaysEmployee::factory()->createMany([
            [
                'work_day' => 'Monday',
                'work_day_start' => '08:00',
                'work_day_end' => '16:00',
            ],
            [
                'work_day' => 'Tuesday',
                'work_day_start' => '08:00',
                'work_day_end' => '16:00',
            ],
            [
                'work_day' => 'Wednesday',
                'work_day_start' => '08:00',
                'work_day_end' => '16:00',
            ],
            [
                'work_day' => 'Thursday',
                'work_day_start' => '08:00',
                'work_day_end' => '16:00',
            ],
            [
                'work_day' => 'Friday',
                'work_day_start' => '08:00',
                'work_day_end' => '16:00',
            ],
            [
                'work_day' => 'Saturday',
                'work_day_start' => null,
                'work_day_end' => null,
            ],
            [
                'work_day' => 'Sunday',
                'work_day_start' => null,
                'work_day_end' => null,
            ]
        ]);
    }
}
