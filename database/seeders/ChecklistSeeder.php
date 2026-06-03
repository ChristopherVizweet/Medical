<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SectionItemsChecklist;

class ChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
        }
    }
}
