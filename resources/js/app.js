import './bootstrap';
import './angular-controllers/module';
import './angular-controllers/chat';
import './angular-controllers/auth';
import { io } from 'socket.io-client';

const isAuthenticated = Boolean(window.authUser?.id);

if (isAuthenticated) {
    const socket = io("http://192.168.0.94:3000", {
        auth: {
            userId: window.authUser.id,
        },
    });

    socket.on("message", (msg) => {
        console.log("New message:", msg);
    });

    socket.on("connect", () => {
        console.log("Client connected:", window.authUser);
    });

    socket.on("disconnect", () => {
        console.log("Client disconnected", window.authUser);
    });
    window.socket = socket;
} else {
    console.info("Skipping socket.io connection for unauthenticated session.");
}
