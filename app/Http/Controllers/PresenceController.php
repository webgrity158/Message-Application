<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Redis;

class PresenceController extends Controller
{
    private const ONLINE_USERS_KEY = 'presence:users';

    public function status(User $user): JsonResponse
    {
        $count = Redis::connection()->hget(self::ONLINE_USERS_KEY, $user->getKey()) ?? 0;
        $online = (int) $count > 0;

        return response()->json([
            'success' => 1,
            'message' => 'Presence fetched.',
            'data' => [
                'user_id' => $user->getKey(),
                'online' => $online,
                'connections' => (int) $count,
            ],
        ]);
    }
}
