<?php

namespace App\Models;

use App\Models\User;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable=[
        'last_message_at','uuid'
    ];

    protected $dates=[
        'last_message_at'
    ];

    public function getRouteKeyName(){
        return 'uuid';
    }

    public function users(){
        return $this->belongsToMany(User::class)->withPivot('read_at')->withTimestamps()->oldest();
    }

    public function others(){
        return $this->users()->where('user_id','!=', auth()->id());
    }

    public function messages(){
        return $this->hasMany(Message::class)->latest();
    }
}
