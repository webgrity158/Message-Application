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

    public function index() {
        $messages = $this->messageService->getInitMessages();
        $active_page  = "single-discussion";
        return view('socket.home', compact('messages', 'active_page'));
    }
}
