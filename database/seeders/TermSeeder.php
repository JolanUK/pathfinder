<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    // For the purpose of 'accurate' term management, this seeder is hardcoded. Something like a random faker would work here too
    public function run(): void
    {
        Term::factory()
            ->count(5)
            ->create();
    }
}
