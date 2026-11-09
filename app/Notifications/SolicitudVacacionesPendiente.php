<?php

namespace App\Notifications;

use App\Models\EmpleadoVacaciones;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class SolicitudVacacionesPendiente extends Notification
{
    use Queueable;

    public function __construct(
        public EmpleadoVacaciones $vacacion,
        public string $solicitante
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    public function toArray(object $notifiable): array
    {
        $empleado = $this->vacacion->empleado;

        return [
            'titulo' => 'Solicitud de vacaciones pendiente',
            'mensaje' => "{$this->solicitante} registró {$this->vacacion->dias_tomados} día(s) de vacaciones para {$empleado->Nombre} {$empleado->apellidos}.",
            'vacacion_id' => $this->vacacion->id,
            'empleado_id' => $empleado->id,
            'empleado' => trim("{$empleado->Nombre} {$empleado->apellidos}"),
            'fecha_inicio' => $this->vacacion->fecha_inicio->format('Y-m-d'),
            'fecha_fin' => $this->vacacion->fecha_fin->format('Y-m-d'),
            'dias_tomados' => $this->vacacion->dias_tomados,
            'url' => route('edit-vacaciones-empleado', $this->vacacion->id),
        ];
    }

    public function toDatabase(object $notifiable): array
    {
        return $this->toArray($notifiable);
    }

    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage($this->toArray($notifiable));
    }
}
