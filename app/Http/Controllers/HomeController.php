<?php

namespace App\Http\Controllers;

use App\Services\MessageService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $messageService;
    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function initData() {
        $messages = $this->messageService->getInitMessages();
        $active_page  = "single-discussion";
        return response()->json([
            'success' => 1,
            'message' => 'success',
            'data' => [
                'messages' => $messages,
                'active_page' => $active_page,
            ]
        ], 200);
    }

    public function inboxData(Request $request) {
        $request->validate([
            'user_id' => 'required|integer',
            'type' => 'required|in:1,2',
        ]);
        $messages = $this->messageService->getInboxMessages($request);
        return response()->json([
            'success' => 1,
            'message' => 'success',
            'data' => [
                'messages' => $messages,
            ]
        ], 200);
    }
}
