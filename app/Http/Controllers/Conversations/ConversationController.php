<?php

namespace App\Http\Controllers\Conversations;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index(Request $request){
        
        return view('conversations.index');
    }

    public function show(Request $request, Conversation $conversation){

        $this->authorize('show',$conversation);
        $request->user()->conversations()->updateExistingPivot($conversation,[
            'read_at'=>now()
        ]);

        return view('conversations.show', compact('conversation'));
    }

    public function create(Request $request){
        return view('conversations.create');
    }
}
