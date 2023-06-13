<form action="" class="bg-white" wire:submit.prevent="create">
    <div class="p-4 border-bottom">
        <div class="mb-2 text-muted">
            Send to 
            @foreach($users as $index=> $user)
                <a class="link font-weight-bold" href="javascript:void(0)">{{ $user['name'] }}</a>@if($index+1 !=count($users)), @endif
            @endforeach
        </div>
        <div x-data="{...conversationCreateState(), ...userSearchState()}">
            <x-conversations.user-search>
                <x-slot name="suggestions">
                    <template x-for="user in suggestions" :key="user.id">
                        <a href="#" x-on:click="addUser(user)" class="d-block link" x-text="user.name"></a>
                    </template>
                </x-slot>
            </x-conversations.user-search>
        </div>
    </div>
    <div class="p-4 border-top">
        <div class="form-group">
            <label for="body" class="sr-only">Message</label>
            <textarea name="body" id="body" rows="3" class="form-control" wire:model="body"></textarea>
        </div>
        <div class="form-group pt-2">
            <button type="submit" class="btn btn-secondary w-100" style="background-color: #6c757d">Start conversation</button>
        </div>
        
    </div>
</form>

<script>
    function conversationCreateState(){
        return {
         
            addUser(user){
                @this.call('addUser',user);
                this.$refs.search.value = '';
                this.suggestions = [];
            }
        }
    }
</script>
