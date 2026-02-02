import Echo from 'laravel-echo';
import io from 'socket.io-client';

window.io = io;

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001',
    transports: ['websocket'],
});

// Provide a lowercase alias so `window.echo` is available in the console
window.echo = window.Echo;
console.log('Echo initialized:', window.Echo);
