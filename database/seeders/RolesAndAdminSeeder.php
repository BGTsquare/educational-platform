<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Student']);

        // Create a default admin user
        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@eduplatform.test',
            'password' => Hash::make('password'), // Use a secure password in production!
        ]);

        // Assign the 'Admin' role to the admin user
        $adminUser->assignRole('Admin');
    }
}
