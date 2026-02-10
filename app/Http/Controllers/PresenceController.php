<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Redis;

class PresenceController extends Controller
{
    private const ONLINE_USERS_KEY = 'presence:users';

    public function status($userId): JsonResponse
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json([
                'success' => 1,
                'message' => 'User not found; treating as offline.',
                'data' => [
                    'user_id' => $userId,
                    'online' => false,
                    'connections' => 0,
                    'exists' => false,
                ],
            ]);
        }

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
