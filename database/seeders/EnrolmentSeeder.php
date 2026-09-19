<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Enrolment;
use Illuminate\Database\Seeder;

class EnrolmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Enrolment::factory(count: 100)->create()->each(function ($enrolment) {
        //     Attendance::factory(rand(1, 10))->create(['enrolment_id' => $enrolment->id]);
        // });
    }
}
