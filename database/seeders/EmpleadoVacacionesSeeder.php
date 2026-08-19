<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EmpleadoVacaciones;
use App\Models\Empleados;

class EmpleadoVacacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Datos de ejemplo para vacaciones
        $empleadosData = [
            [
                'empleado_id' => 1,
                'fecha_inicio' => '2026-02-11',
                'fecha_fin' => '2026-02-15',
                'dias_tomados' => 5,
                'estado' => 'aprobado',
                'observaciones' => 'Vacaciones de verano'
            ],
            [
                'empleado_id' => 1,
                'fecha_inicio' => '2026-03-15',
                'fecha_fin' => '2026-03-17',
                'dias_tomados' => 3,
                'estado' => 'aprobado',
                'observaciones' => 'Fin de semana extendido'
            ],
            [
                'empleado_id' => 1,
                'fecha_inicio' => '2026-04-04',
                'fecha_fin' => '2026-04-04',
                'dias_tomados' => 1,
                'estado' => 'aprobado',
                'observaciones' => 'Día de descanso'
            ],
            [
                'empleado_id' => 2,
                'fecha_inicio' => '2026-05-11',
                'fecha_fin' => '2026-05-13',
                'dias_tomados' => 3,
                'estado' => 'aprobado',
                'observaciones' => 'Vacaciones'
            ],
        ];

        foreach ($empleadosData as $data) {
            // Verificar que el empleado exista antes de crear el registro
            if (Empleados::find($data['empleado_id'])) {
                EmpleadoVacaciones::updateOrCreate(
                    [
                        'empleado_id' => $data['empleado_id'],
                        'fecha_inicio' => $data['fecha_inicio'],
                    ],
                    $data
                );
            }
        }
    }
}
