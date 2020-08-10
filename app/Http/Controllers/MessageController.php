<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class MessageController extends Controller
{
    public function message(Request $request)
    {
        $auth_user = Auth::user();
        $message_request = [
            'message_description' => $request->get('admin_message'),
            'message_user_id' => $auth_user->id,
            'message_user_name' => $auth_user->name,
        ];
        $request_sync_user_message = $request->get('admin_user_select');
        $create_table_message = Message::create($message_request);
        if ($create_table_message) {
            $create_table_message->users()->sync($request_sync_user_message);
            return redirect()->Route('app.home.profile')->with(['success' => 'your messages successfully send']);
        }
    }

}
