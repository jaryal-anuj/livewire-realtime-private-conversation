<div x-data="{...userSearchState(),...userAddState()}">
    <div class="d-flex justify-content-between" x-bind:class="{'mb-2':show}">
        <div class="font-wieght-bold text-muted">
            @foreach($users as $user)
                {{ $user->present()->name }} @if($users->last()!=$user), @endif
            @endforeach
        </div>
        <a href="#" style="color:blue;" x-on:click.prevent="show =!show">Add someone</a>
    </div>
    <div x-show="show">
        <x-conversations.user-search>
            <x-slot name="suggestions">
                <template x-for="user in suggestions" :key="user.id">
                    <a href="#" x-on:click="addUser(user)" class="d-block link" x-text="user.name"></a>
                </template>
            </x-slot>
        </x-conversations.user-search>
    </div>
</div>

<script>
    function userAddState(){
        return {
            show:false,
            addUser(user){
                @this.call('addUser',user);

                this.$refs.search.value="";
                this.suggestions=[];
                this.show =false;
            }
        }
    }
</script>
