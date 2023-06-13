<?php

namespace App\Events\Conversations;

use App\Models\Conversation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ConversationCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $conversation;

    public function __construct(Conversation $conversation)
    {
        
        $this->conversation = $conversation;
    }
    public function broadcastWith(){
        return [
            'conversation'=>[
                'id'=>$this->conversation->id
            ]
        ];
    }
    public function broadcastOn(): array
    {  
        return $this->conversation->others->map(function($user){
            
            return new PrivateChannel('users.'.$user->id);
        })->toArray();
      
    }
}
