<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
            return $this->loadLatestMessages($request);
        }
    }
}
