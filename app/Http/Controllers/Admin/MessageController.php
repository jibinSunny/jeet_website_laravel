<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function showMessages(Request $request){
        return view('admin.messages.showMessages');
    }
    public function fetchChatHead(Request $request){
        $messages = Message::with('admins','students')->orderBy('created_at','DESC')->get();
        return response()->json(['status' => true, 'messages' => $messages]);
    }
    public function postMessages(Request $request){
        $user = Auth::user();
        $message = Message::create([
            'message' => $request->input('message')
        ]);
        return ['status' => 'Message Sent!'];
    }
}
