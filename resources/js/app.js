import './bootstrap';
import './angular-controllers/module';
import './angular-controllers/chat';
import './angular-controllers/auth';
import { io } from 'socket.io-client';

const socket = io("http://192.168.0.202:3000");

socket.on("message", (msg) => {
    console.log("New message:", msg);
});

socket.on("connect", () => {
    console.log("Client connected:", socket.id);
});

socket.on("disconnect", () => {
    console.log("Client disconnected");
});
