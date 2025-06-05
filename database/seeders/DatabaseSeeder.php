<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
        
    #Aqui estoy colocando el nombre de los roles
    $superadmin = Role::create(['name' => 'superadmin']);
    $admin = Role::create(['name' => 'admin']);
    $ventas = Role::create(['name' => 'ventas']);
    $almacen = Role::create(['name' => 'almacen']);

    #Estos son los permisos
    #Permisos para gestionar a los clientes
    Permission::create(['name' => 'ver clientes']);
    Permission::create(['name' => 'crear clientes']);
    Permission::create(['name' => 'editar clientes']);
    Permission::create(['name' => 'eliminar clientes']);
    #Permisos para gestionar a los proveedores
    Permission::create(['name' => 'ver proveedores']);
    Permission::create(['name' => 'crear proveedores']);
    Permission::create(['name' => 'editar proveedores']);
    Permission::create(['name' => 'eliminar proveedores']);
    #Permisos para gestionar los productos
    Permission::create(['name' => 'ver productos']);
    Permission::create(['name' => 'crear productos']);
    Permission::create(['name' => 'editar productos']);
    Permission::create(['name' => 'eliminar productos']);
    #Permisos para gestionar las ventas (cotizaciones, entradas y salidas)
    Permission::create(['name' => 'gestionar ventas']);
    Permission::create(['name' => 'gestionar existencias']);
    #Permisos para la gestion de usuarios
    Permission::create(['name' => 'ver usuarios']);
    Permission::create(['name' => 'crear usuarios']);
    Permission::create(['name' => 'editar usuarios']);
    Permission::create(['name' => 'eliminar usuarios']);
    
    #Para cada rol tiene permisos
    $superadmin->givePermissionTo(['ver clientes','crear clientes','editar clientes','eliminar clientes',
'ver proveedores','crear proveedores','editar proveedores','eliminar proveedores','ver productos',
'crear productos','editar productos','eliminar productos','gestionar ventas','gestionar existencias',
'ver usuarios','crear usuarios','editar usuarios','eliminar usuarios']);
    $admin->givePermissionTo(['ver clientes','crear clientes','editar clientes','eliminar clientes',
    'ver proveedores','crear proveedores','editar proveedores','eliminar proveedores','ver productos',
    'crear productos','editar productos','eliminar productos','gestionar ventas','gestionar existencias',
    'ver usuarios']);
    $ventas->givePermissionTo(['ver clientes','crear clientes','editar clientes','eliminar clientes',
'ver proveedores','crear proveedores','editar proveedores','eliminar proveedores','ver productos',
'crear productos','editar productos','eliminar productos','gestionar ventas','gestionar existencias']);
    $almacen->givePermissionTo(['gestionar existencias']);
    }

}
