<?php

// app/Http/Controllers/JitsiController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JitsiController extends Controller
{
    public function index()
    {
        // Generate a unique room name for the logged-in user
        $user = Auth::user();
        $roomName = 'room_' . $user->id;

        return view('jitsi.index', compact('roomName'));
    }

    public function room($roomName)
    {
        return view('jitsi.room', compact('roomName'));
    }
}
