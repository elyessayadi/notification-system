import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true
});

const userId = document.head.querySelector('meta[name="user-id"]').content;

window.Echo.channel('notifications.' + userId)
    .listen('NotificationSent', (e) => {
        console.log(e);
        const notificationsContainer = document.getElementById('notifications-container');
        notificationsContainer.innerHTML += `<h3>Message: <span style="color:blue">${e.message}</span></h3>`;
    });
