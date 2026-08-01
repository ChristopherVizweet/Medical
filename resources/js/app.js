import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('notificationBell', (userId) => ({
    open: false,
    count: 0,
    notifications: [],
    loading: false,
    audio: null,
audioEnabled: false,

    async init() {
this.audio = new Audio('/sounds/notification.mp3');
    this.audio.preload = 'auto';
    this.audio.volume = 0.7;

        await this.loadNotifications();

        if (window.Echo && userId) {
            window.Echo
                .private(`App.Models.User.${userId}`)
                .notification((notification) => {
                    this.addNotification(notification);
                });
        }
    },
// Función para cargar las notificaciones con sonido
async enableSound() {
    if (!this.audio || this.audioEnabled) {
        return;
    }

    try {
        this.audio.muted = true;
        await this.audio.play();

        this.audio.pause();
        this.audio.currentTime = 0;
        this.audio.muted = false;
        this.audioEnabled = true;

        console.log('Sonido de notificaciones habilitado');
    } catch (error) {
        console.error('No se pudo habilitar el sonido:', error);
    }
},

playNotificationSound() {
    if (!this.audio || !this.audioEnabled) {
        return;
    }

    this.audio.currentTime = 0;

    this.audio.play().catch((error) => {
        console.warn('No se pudo reproducir la notificación:', error);
    });
},





    async loadNotifications() {
        this.loading = true;

        try {
            const response = await window.axios.get(
                '/notifications/unread'
            );

            this.count = response.data.count;
            this.notifications = response.data.notifications;
        } catch (error) {
            console.error(
                'No se pudieron cargar las notificaciones:',
                error
            );
        } finally {
            this.loading = false;
        }
    },

    addNotification(notification) {
        this.notifications.unshift({
            id: notification.id ?? null,
            movimiento_id: notification.movimiento_id ?? null,
            titulo:
                notification.titulo ??
                'Nueva notificación',
            mensaje:
                notification.mensaje ??
                notification.message ??
                'Tienes una nueva notificación.',
            url: notification.url ?? '#',
            created_at: 'Ahora',
        });

        this.count++;

        this.playNotificationSound();
    },

    async openNotification(notification) {
        /*
         * En las notificaciones recibidas en tiempo real, el UUID de la
         * notificación puede no venir incluido. Se recargan desde la BD
         * para obtener el ID correcto antes de abrirla.
         */
        if (!notification.id) {
            await this.loadNotifications();
            return;
        }

        try {
            await window.axios.patch(
                `/notifications/${notification.id}/read`
            );

            this.notifications = this.notifications.filter(
                item => item.id !== notification.id
            );

            this.count = Math.max(0, this.count - 1);

            if (notification.url && notification.url !== '#') {
                window.location.href = notification.url;
            }
        } catch (error) {
            console.error(
                'No se pudo marcar la notificación como leída:',
                error
            );
        }
    },

    async markAllAsRead() {
        try {
            await window.axios.patch('/notifications/read-all');

            this.notifications = [];
            this.count = 0;
            this.open = false;
        } catch (error) {
            console.error(
                'No se pudieron marcar las notificaciones:',
                error
            );
        }
    },
}));

/*
 * Alpine debe iniciarse una sola vez y después de registrar
 * todos los componentes Alpine.data().
 */
Alpine.start();

document.querySelectorAll('.setMode').forEach((item) => {
    item.addEventListener('click', () => {
        if (localStorage.dark === '1') {
            localStorage.dark = '0';
            document.documentElement.classList.remove('dark');
        } else {
            localStorage.dark = '1';
            document.documentElement.classList.add('dark');
        }
    });
});