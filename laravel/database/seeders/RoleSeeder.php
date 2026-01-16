<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $manager = Role::firstOrCreate(['name' => 'manager']);
        $staff = Role::firstOrCreate(['name' => 'staff']);

        // Admin gets ALL permissions
        $admin->permissions()->sync(Permission::pluck('id'));

        // Manager permissions
        $manager->permissions()->sync(
            Permission::whereIn('name', [
                'products.create',
                'products.update',
                'category.create',
                'category.update',
            ])->pluck('id')
        );

        // Staff permissions
        $staff->permissions()->sync(
            Permission::whereIn('name', [
                'category.update',
            ])->pluck('id')
        );
    }
}
