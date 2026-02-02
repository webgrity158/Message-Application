import { Server } from 'socket.io';
import Redis from 'ioredis';

const io = new Server(3000, {
    cors: {
        origin: [
            "http://localhost",
            "http://localhost:8000",
            "http://127.0.0.1:8000",
            "http://192.168.0.215:8000",
            "http://192.168.0.215:3000"
        ],
        methods: ["GET", "POST"],
        credentials: true,
    },
});

const redis = new Redis();

redis.psubscribe("*", (err, count) => {
    console.log("Subscribed to Redis");
});

redis.on("pmessage", (pattern, channel, message) => {
    const data = JSON.parse(message);
    if (data.event === "message.sent") {
        io.emit("message", data.data.message);
    }
});

io.on("connection", (socket) => {
    console.log("Client connected:", socket.id);
    socket.on("disconnect", () => {
        console.log("Client disconnected");
    });
});

console.log("Socket.IO running on port 3000");
