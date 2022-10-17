<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Events\NewMessageNotification;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $data = array('user_id' => $user_id);

        return view('broadcast', $data);
    }

    public function send()
    {
        // want to broadcast NewMessageNotification event
        #event(new NewMessageNotification($message));
        broadcast(new NewMessage("hola"));
    }
}
