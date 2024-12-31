<?php

namespace Database\Seeders;

use Database\Seeders\SchoolClassSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\TeacherSeeder;

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
            TeacherSeeder::class,
            SchoolClassSeeder::class
        ]);
    }
}
