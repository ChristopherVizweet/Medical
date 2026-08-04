<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\SectionItemsChecklist;
use App\Models\ItemsChecklist;


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
    $laboratorio = Role::create(['name' => 'laboratorio']);
    $ingenieria = Role::create(['name' => 'ingenieria']);

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
    $ingenieria->givePermissionTo(['ver clientes','crear clientes','editar clientes','eliminar clientes',
    'ver proveedores','crear proveedores','editar proveedores','eliminar proveedores','ver productos',
    'crear productos','editar productos','eliminar productos','gestionar ventas','gestionar existencias']);
    $this->call(SuperadminSeeder::class);

    $sections = [
    'SISTEMA DE LUCES',
    'PARTE EXTERNA',
    'PARTE INTERNA',
    'ESTADO DE LLANTAS',
    'ACCESORIOS DE SEGURIDAD',
    'TAPAS Y OTROS',
];

foreach ($sections as $section) {
    SectionItemsChecklist::create([
        'nombre_seccion_ch' => $section,
    ]);
    $this->call(ChecklistSeeder::class);
}
    

$items = [
            ['id_section' => 1, 'nombre_items_ch' => 'luz delantera alta'],
            ['id_section' => 1, 'nombre_items_ch' => 'luz delantera baja'],
            ['id_section' => 1, 'nombre_items_ch' => 'Luces de emergencia'],
            ['id_section' => 1, 'nombre_items_ch' => 'Luces neblineros'],
            ['id_section' => 1, 'nombre_items_ch' => 'Luz direccional'],
            ['id_section' => 1, 'nombre_items_ch' => 'Luz de freno posterior'],
            ['id_section' => 1, 'nombre_items_ch' => 'Luz de faros piratas'],

            ['id_section' => 2, 'nombre_items_ch' => 'Parabrisas delantera'],
            ['id_section' => 2, 'nombre_items_ch' => 'Parabrisas posterior'],
            ['id_section' => 2, 'nombre_items_ch' => 'Limpia parabrisas'],
            ['id_section' => 2, 'nombre_items_ch' => 'Espejo retrovisor'],
            ['id_section' => 2, 'nombre_items_ch' => 'Espejo lateral'],

            ['id_section' => 3, 'nombre_items_ch' => 'Estado de tablero / Indicadores operativos'],
            ['id_section' => 3, 'nombre_items_ch' => 'Freno de mano'],
            ['id_section' => 3, 'nombre_items_ch' => 'Freno de servicio'],
            ['id_section' => 3, 'nombre_items_ch' => 'Cinturón de seguridad copiloto'],
            ['id_section' => 3, 'nombre_items_ch' => 'Cinturón de seguridad conductor'],
            ['id_section' => 3, 'nombre_items_ch' => 'Espejo retrovidor antideslumbrante'],
            ['id_section' => 3, 'nombre_items_ch' => 'Linterna de mano'],
            ['id_section' => 3, 'nombre_items_ch' => 'Orden y limpieza de cabina'],
            ['id_section' => 3, 'nombre_items_ch' => 'Dirección'],

            ['id_section' => 4, 'nombre_items_ch' => 'Llanta delantera derecha'],
            ['id_section' => 4, 'nombre_items_ch' => 'Llanta delantera izquierda'],
            ['id_section' => 4, 'nombre_items_ch' => 'Llanta posterior derecha'],
            ['id_section' => 4, 'nombre_items_ch' => 'Llanta posterior izquierda'],
            ['id_section' => 4, 'nombre_items_ch' => 'Llanta de repuesto'],

            ['id_section' => 5, 'nombre_items_ch' => 'Conos de seguridad'],
            ['id_section' => 5, 'nombre_items_ch' => 'Extintor'],
            ['id_section' => 5, 'nombre_items_ch' => 'Alarma de retrocesos'],
            ['id_section' => 5, 'nombre_items_ch' => 'Claxón'],
            ['id_section' => 5, 'nombre_items_ch' => 'Cuñas de seguridad'],

            ['id_section' => 6, 'nombre_items_ch' => 'Tapa de tanqwue de gasolina y/o petróleo'],
            ['id_section' => 6, 'nombre_items_ch' => 'Gato hidraulico'],
            ['id_section' => 6, 'nombre_items_ch' => 'Herramienta y palanca de ruedas'],
            ['id_section' => 6, 'nombre_items_ch' => 'Cable, cadena y/o estrobo'],
            
        ];

        foreach ($items as $item) {
            ItemsChecklist::create($item);
            $this->call(ItemsChecklistSeeder::class);
        }
    }

}
