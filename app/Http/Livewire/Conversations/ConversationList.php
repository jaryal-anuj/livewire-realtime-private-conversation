<?php

namespace App\Http\Livewire\Conversations;

use Livewire\Component;
use App\Models\Conversation;
use Illuminate\Support\Collection;

class ConversationList extends Component
{
    public $conversations;

    public function getListeners(){
        return [
            "echo-private:users.".auth()->id().",Conversations\\ConversationCreated"=>'prependConversationFromBroadcast',
            "echo-private:users.".auth()->id().",Conversations\\ConversationUpdated"=>'updateConversationFromBroadcast',
        ];

    }

    public function prependConversation($id){
        $this->conversations->prepend(Conversation::find($id));
       
    }

    public function updateConversationFromBroadcast($payload){
        //dd($this->conversations->find($payload['conversation']['id']));
        $this->conversations->find($payload['conversation']['id'])->fresh();
        // $this->conversations = $this->conversations->map(function($conversation) use($id){
        //     if($conversation->id == $id){
        //         $conversation =auth()->user()->conversations()->find($id);
        //     }
        //     return $conversation;
        // });
    }

    public function prependConversationFromBroadcast($payload){
      
        $this->prependConversation($payload['conversation']['id']);
       
    }

    public function mount(Collection $conversations){

  
        $this->conversations = $conversations;
    }

    public function render()
    {
        return view('livewire.conversations.conversation-list');
    }
}
