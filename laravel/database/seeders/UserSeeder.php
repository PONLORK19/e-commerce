<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Fetch roles
        $adminRole   = Role::where('name', 'admin')->first();
        $managerRole = Role::where('name', 'manager')->first();
        $staffRole   = Role::where('name', 'staff')->first();

        // Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );
        $admin->roles()->sync([$adminRole->id]);

        // Manager
        $manager = User::firstOrCreate(
            ['email' => 'manager@test.com'],
            [
                'name' => 'Manager User',
                'password' => Hash::make('password'),
            ]
        );
        $manager->roles()->sync([$managerRole->id]);

        // Staff 1
        $staff1 = User::firstOrCreate(
            ['email' => 'staff1@test.com'],
            [
                'name' => 'Staff One',
                'password' => Hash::make('password'),
            ]
        );
        $staff1->roles()->sync([$staffRole->id]);

        // Staff 2
        $staff2 = User::firstOrCreate(
            ['email' => 'staff2@test.com'],
            [
                'name' => 'Staff Two',
                'password' => Hash::make('password'),
            ]
        );
        $staff2->roles()->sync([$staffRole->id]);
    }
}
