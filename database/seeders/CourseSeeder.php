<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    // As with the term seeder, faker data would be an OK fallback but the lack of real-world context might be confusing
    public function run(): void
    {
        // Course::factory(count: 10)->create()->each(function ($course) {
        //     Module::factory(20)->create(['course_id' => $course->id]);
        // });
    }
}
