<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
      public function unread(Request $request): JsonResponse
    {
        $notifications = $request->user()
            ->unreadNotifications()
            ->latest()
            ->limit(10)
            ->get()
            ->map(fn (DatabaseNotification $notification) => [
                'id' => $notification->id,
                'titulo' => $notification->data['titulo']
                    ?? 'Nueva notificación',
                'mensaje' => $notification->data['mensaje']
                    ?? $notification->data['message']
                    ?? '',
                'url' => $notification->data['url']
                    ?? '#',
                'created_at' => $notification->created_at
                    ->diffForHumans(),
            ]);

        return response()->json([
            'count' => $request->user()
                ->unreadNotifications()
                ->count(),

            'notifications' => $notifications,
        ]);
    }

    public function markAsRead(
        Request $request,
        DatabaseNotification $notification
    ): JsonResponse {
        abort_unless(
            $notification->notifiable_type === get_class($request->user())
            && (int) $notification->notifiable_id === (int) $request->user()->id,
            403
        );

        $notification->markAsRead();

        return response()->json([
            'message' => 'Notificación marcada como leída.',
        ]);
    }

    public function markAllAsRead(Request $request): JsonResponse
    {
        $request->user()
            ->unreadNotifications()
            ->update(['read_at' => now()]);

        return response()->json([
            'message' => 'Notificaciones marcadas como leídas.',
        ]);
    }
}
