<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\User;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(count: 20)->create()->each(function ($user) {
            Participant::factory(1)->create(['user_id' => $user->id]);
        });
    }
}
