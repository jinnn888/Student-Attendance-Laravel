<?php

namespace Database\Seeders;

use Database\Seeders\SchoolClassSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\TeacherSeeder;
use App\Models\Teacher;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TeacherSeeder::class,
            // SchoolClassSeeder::class
        ]);
        // Insert user_id to the teachers table
        // Teacher::factory(10)->create();
    }
}
