<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RotesController extends Controller
{
    public function home() {
        return view('socket.home');
    }
}
