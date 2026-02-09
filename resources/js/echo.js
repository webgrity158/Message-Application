import Echo from 'laravel-echo';
import io from 'socket.io-client';

const shouldInitialize = Boolean(window.authUser?.id);

if (!shouldInitialize) {
    window.io = null;
    window.Echo = null;
    window.echo = null;
    console.info('Echo is disabled for guest sessions.');
} else {
    window.io = io;

    window.Echo = new Echo({
        broadcaster: 'socket.io',
        host: window.location.hostname + ':6001',
        transports: ['websocket'],
    });

    // Provide a lowercase alias so `window.echo` is available in the console
    window.echo = window.Echo;
}
