<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//dependencias de permisos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // asignación de permisos a variables
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'User']);

        Permission::create(['name' => 'home'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'proyects.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'user.update'])->syncRoles([$role1,$role2]);


    }
}
