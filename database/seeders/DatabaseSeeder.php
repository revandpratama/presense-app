<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::factory(10)->create();

        \App\Models\Presense::create([
            'user_id' => '8',
            'subject_id' => '1',
            'appointment' => '2',
            'status' => 'present'
        ]);
        \App\Models\Presense::create([
            'user_id' => '8',
            'subject_id' => '2',
            'appointment' => '2',
            'status' => 'absent'
        ]);
        \App\Models\Presense::create([
            'user_id' => '8',
            'subject_id' => '3',
            'appointment' => '2',
            'status' => 'present'
        ]);
        \App\Models\Presense::create([
            'user_id' => '1',
            'subject_id' => '4',
            'appointment' => '2',
            'status' => 'present'
        ]);


        // \App\Models\Subject::create([
        //     'name' => 'Science'
        // ]);
        // \App\Models\Subject::create([
        //     'name' => 'Programming'
        // ]);
        // \App\Models\Subject::create([
        //     'name' => 'Social'
        // ]);
        // \App\Models\Subject::create([
        //     'name' => 'Math'
        // ]);
    }
}
