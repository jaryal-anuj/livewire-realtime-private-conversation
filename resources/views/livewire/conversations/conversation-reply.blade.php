<form x-data="conversationReplyState()" wire:submit.prevent="reply">
    <div class="form-group mb-0">
        <textarea wire:model.defer="body" cols="30" rows="3" class="form-control" x-on:keydown.enter="submit" placeholder="Type your reply"></textarea>
    </div>
    <button class="btn sr-only" type="submit" x-ref="submit" >Send</button>
</form>
<script>
    function conversationReplyState(){
        return {
            submit(){
                this.$refs.submit.click();
            }
        }
    }
</script>