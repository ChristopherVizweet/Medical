<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('empleado_vacaciones', function (Blueprint $table) {
            $table->string('periodo', 9)->nullable()->after('fecha_fin');
        });

        DB::table('empleado_vacaciones')
            ->select(['id', 'fecha_inicio'])
            ->orderBy('id')
            ->chunkById(200, function ($vacaciones) {
                foreach ($vacaciones as $vacacion) {
                    $year = Carbon::parse($vacacion->fecha_inicio)->year;

                    DB::table('empleado_vacaciones')
                        ->where('id', $vacacion->id)
                        ->update(['periodo' => $year . '-' . ($year + 1)]);
                }
            });
    }

    public function down(): void
    {
        Schema::table('empleado_vacaciones', function (Blueprint $table) {
            $table->dropColumn('periodo');
        });
    }
};
