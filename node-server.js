import { Server } from 'socket.io';
import Redis from 'ioredis';

const io = new Server(3000, {
    cors: {
        origin: [
            "http://localhost",
            "http://localhost:8000",
            "http://127.0.0.1:8000",
            "http://192.168.0.94:8000",
            "http://192.168.0.94:3000"
        ],
        methods: ["GET", "POST"],
        credentials: true,
    },
});

const redis = new Redis();
const subscriber = new Redis();
const ONLINE_USERS_KEY = "presence:users";

subscriber.psubscribe("*", (err, count) => {
    console.log("Subscribed to Redis");
});

subscriber.on("pmessage", (pattern, channel, message) => {
    const data = JSON.parse(message);
    if (data.event === "message.sent") {
        io.emit("message", data.data.message);
    }
});

io.use((socket, next) => {
    const userId = socket.handshake?.auth?.userId;
    if (!userId) {
        console.warn("Socket connection rejected — missing userId");
        return next(new Error("USER_ID_REQUIRED"));
    }

    socket.userId = userId?.toString?.() ?? `${userId}`;
    if (!socket.userId) {
        return next(new Error("USER_ID_REQUIRED"));
    }

    next();
});

const trackUserConnected = (userId) => {
    return redis.hincrby(ONLINE_USERS_KEY, userId, 1);
};

const trackUserDisconnected = async (userId) => {
    const remaining = await redis.hincrby(ONLINE_USERS_KEY, userId, -1);
    if (remaining <= 0) {
        await redis.hdel(ONLINE_USERS_KEY, userId);
    }
};

io.on("connection", (socket) => {
    console.log("Client connected:", socket.id);
    trackUserConnected(socket.userId).catch((error) => {
        console.error("Failed to mark user online:", error);
    });

    socket.on("disconnect", () => {
        console.log("Client disconnected");
        trackUserDisconnected(socket.userId).catch((error) => {
            console.error("Failed to mark user offline:", error);
        });
    });
});

console.log("Socket.IO running on port 3000");
