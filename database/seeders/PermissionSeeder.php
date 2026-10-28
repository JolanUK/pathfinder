<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Basic gates for access to individual panels
        Permission::create(['name' => 'staff']);
        Permission::create(['name' => 'participant']);

        // Admin permissions
        Permission::create(['name' => 'administer site']);
        Permission::create(['name' => 'administer settings']);
        Permission::create(['name' => 'administer roles']);
        Permission::create(['name' => 'administer permissions']);
        Permission::create(['name' => 'administer users']);

        // Term permissions
        Permission::create(['name' => 'edit terms']);
        Permission::create(['name' => 'create terms']);
        Permission::create(['name' => 'assign terms']);

        // Admissions permissions
        Permission::create(['name' => 'edit admissions']);
        Permission::create(['name' => 'approve admissions']);
        Permission::create(['name' => 'reject admissions']);
        Permission::create(['name' => 'defer admissions']);

        // Attendance permissions
        Permission::create(['name' => 'edit attendances']);
        Permission::create(['name' => 'set attendances']);
        Permission::create(['name' => 'override attendances']);
    }
}
