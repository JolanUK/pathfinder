<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Basic staff permissions
        Permission::create(['name' => 'staff']);

        // Admin permissions
        Permission::create(['name' => 'administer site']);
        Permission::create(['name' => 'administer settings']);
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

        // Create roles and assign existing permissions
        $role_staff = Role::create(['name' => 'staff']);
        $role_staff->givePermissionTo('staff');

        $role_technical_admin = Role::create(['name' => 'technical_admin']);

        $role_terms = Role::create(['name' => 'terms_manager']);
        $role_terms->givePermissionTo('edit terms');
        $role_terms->givePermissionTo('create terms');
        $role_terms->givePermissionTo('assign terms');

        $role_admissions = Role::create(['name' => 'admissions_manager']);
        $role_admissions->givePermissionTo('edit admissions');
        $role_admissions->givePermissionTo('approve admissions');
        $role_admissions->givePermissionTo('reject admissions');
        $role_admissions->givePermissionTo('defer admissions');

        $role_attendances = Role::create(['name' => 'attendances_manager']);
        $role_attendances->givePermissionTo('edit attendances');
        $role_attendances->givePermissionTo('set attendances');
        $role_attendances->givePermissionTo('override attendances');

        $user = User::factory()->create([
            'name' => 'Example Technical Admin',
            'email' => 'technicaladmin@example.com',
        ]);
        $user->assignRole($role_staff);
        $user->assignRole($role_technical_admin);

        $user = User::factory()->create([
            'name' => 'Example Admissions Manager',
            'email' => 'admissions@example.com',
        ]);
        $user->assignRole($role_staff);
        $user->assignRole($role_admissions);

        $user = User::factory()->create([
            'name' => 'Example Attendances Manager',
            'email' => 'attendances@example.com',
        ]);
        $user->assignRole($role_staff);
        $user->assignRole($role_attendances);

        $user = User::factory()->create([
            'name' => 'Example Admin',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role_staff);
    }
}
