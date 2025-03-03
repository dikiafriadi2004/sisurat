<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role Admin
        Role::create(['name' => 'admin']);

        Permission::create(['name' => 'Admin Users']);
        Permission::create(['name' => 'Pajak Restoran']);
        Permission::create(['name' => 'Pajak Hotel']);
        Permission::create(['name' => 'Pajak Hiburan']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('Admin Users');
        $roleAdmin->givePermissionTo('Pajak Restoran');
        $roleAdmin->givePermissionTo('Pajak Hotel');
        $roleAdmin->givePermissionTo('Pajak Hiburan');
    }
}
