<?php

namespace App\Notifications;

use App\Models\InventarioMovimiento;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class SolicitudSalidaCreada extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct( 
        public InventarioMovimiento $movimiento,
        public string $solicitante
    )
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];

    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return $this->contenido();
    }

   /* public function toBroadcast(object $notifiable): BroadcastMessage
{
    return new BroadcastMessage([
        'id' => $this->id,
        'titulo' => 'Nueva solicitud de salida',
        'mensaje' => $this->solicitante
            . ' realizó una solicitud de material.',
        'movimiento_id' => $this->movimiento->id,
        'folio' => $this->movimiento->folio_movimiento,
        'solicitante' => $this->solicitante,
        'url' => route(
            'edit-salidas',
            $this->movimiento->id
        ),
    ]);
}*/

public function toDatabase(object $notifiable): array
{
         return $this->contenido();
}
public function toBroadcast(object $notifiable): BroadcastMessage
{
    return new BroadcastMessage(
        $this->toDatabase($notifiable)
    );
}
 private function contenido(): array
    {
        return [
            'titulo' => 'Nueva solicitud de salida',
            'mensaje' => "{$this->solicitante} realizo una solicitud de material.",
            'movimiento_id' => $this->movimiento->id,
            'folio' => $this->movimiento->folio_movimiento,
            'solicitante' => $this->solicitante,
            'url' => route('edit-salidas', [
                'id' => $this->movimiento->id,
            ]),
        ];
    }
}
