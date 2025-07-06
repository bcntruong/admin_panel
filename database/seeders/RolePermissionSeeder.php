<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions if they don't exist
        $permissions = [
            'view_role',
            'view_any_role',
            'create_role',
            'update_role',
            'delete_role',
            'delete_any_role',
            'view_user',
            'view_any_user',
            'create_user',
            'update_user',
            'delete_user',
            'delete_any_user',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create admin role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Give all permissions to admin role
        $adminRole->givePermissionTo($permissions);

        // Create super admin role
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);

        // Give all permissions to super admin role
        $superAdminRole->givePermissionTo($permissions);

        // Assign admin role to the first user (or create one if doesn't exist)
        $user = User::first();
        if ($user) {
            $user->assignRole('admin');
        } else {
            // Create a default admin user
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]);
            $user->assignRole('admin');
        }

        $this->command->info('Roles and permissions seeded successfully!');
        $this->command->info('Admin user: admin@example.com / password');
    }
} 