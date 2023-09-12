<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'send_user_id',
        'recipient_user_id',
        'message',

    ];

    public function user()
    {
        return $this->belongsTo(User::class,'send_user_id','id')->withDefault('');
    }

    public function recipient_user()
    {
        return $this->belongsTo(User::class,'recipient_user_id','id')->withDefault('');
    }

}
