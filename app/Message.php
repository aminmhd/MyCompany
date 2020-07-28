<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $primaryKey = 'message_id';
    protected $guarded = ['message_id'];
    public function users()
    {
        return $this->belongsToMany(User::class , 'user_message' , 'message_id' , 'user_id')->withPivot(['created_at']);
    }
}
