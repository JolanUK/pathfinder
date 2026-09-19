<?php

namespace Database\Seeders;

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
            TermSeeder::class,
            UserSeeder::class,
            RolesSeeder::class,
            LocationSeeder::class,
            CourseSeeder::class,
            ModuleSeeder::class,
            ParticipantSeeder::class,
            EnrolmentSeeder::class,
            AttendanceSeeder::class,
            EventSeeder::class,
            TaskSeeder::class,
            PageSeeder::class,
        ]);
    }
}
