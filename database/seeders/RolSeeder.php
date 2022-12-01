<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role1 = Role::create(['name'=> 'Dueño']);
       $role2 = Role::create(['name'=> 'Cliente']);

        Permission::create(['name'=>'casas'])->assignRole($role1);
    }
}
