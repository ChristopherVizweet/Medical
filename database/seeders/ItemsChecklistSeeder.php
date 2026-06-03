<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ItemsChecklist;

class ItemsChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
        }
    }
}
