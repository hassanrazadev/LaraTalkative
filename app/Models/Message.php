<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Message extends Model
{
    protected $fillable = ['from_user', 'to_user', 'message', 'is_read'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fromUser(){
        return $this->belongsTo(User::class, 'from_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function toUser(){
        return $this->belongsTo(User::class, 'to_user');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function loadLatestMessages(Request $request){
        $messages = $this::where(function($query) use ($request) {
            $query->where('from_user', auth()->user()->id)->where('to_user', $request->to_user);
        })->orWhere(function ($query) use ($request) {
            $query->where('from_user', $request->to_user)->where('to_user', auth()->user()->id);
        })->orderBy('created_at', 'ASC')->limit(10)->get();

        return $messages;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function sendMessage(Request $request){
        $status = $this->create($request->all());
        if ($status){
            return $status;
        }
        return false;
    }
}
