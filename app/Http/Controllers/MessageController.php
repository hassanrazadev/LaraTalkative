<?php

namespace App\Http\Controllers;

use App\Events\SendMessageEvent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MessageController extends Controller{

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function loadLatestMessages(Request $request){
        $message = new Message();
        $messages = $message->loadLatestMessages($request);
        $toUser = User::find($request->to_user);

        return view('includes.message-box')->with(['messages' => $messages, 'toUser' => $toUser]);
    }

    public function sendMessage(Request $request){
        $request->validate([
            'to_user' => 'required',
            'from_user' => 'required',
            'message' => 'required'
        ]);

        $message = new Message();
        $status = $message->sendMessage($request);
        if ($status){
            event(new SendMessageEvent($status));
            return $this->loadLatestMessages($request);
        }
    }
}
