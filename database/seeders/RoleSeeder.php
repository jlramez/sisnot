<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /* 
        Admin=> all
        Maager=> actividades, tareas
        usuario => tareas
        */
        $admin=Role::create(['name'=>'admin']);
        $manager=Role::create(['name'=>'manager']);
        $user=Role::create(['name'=>'user']);

        Permission::create(['name'=>'users.index'])->syncRoles([$admin]); 
        Permission::create(['name'=>'roles.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'permissions.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'actuaciones.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'ponencias.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'actuarios.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'expedientes.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'estados.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'tipos.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'home'])->syncRoles([$admin]);

        
    }
}
