
<div class="mt-5">
    <div class="col-6 m-auto">
        <h1>Tweets</h1>
        <form wire:submit.prevent="create" method="POST">
            <div class="form-group">
                <input  type="text" class="form-control" id="comment" 
                        name="comment" placeholder="Escreva o seu tweet"
                        wire:model="comment"
                >
            </div>
            @error('comment')<p class="text-danger">O Comentário é obrigatório!</p> @enderror
            <button type="submit" class="btn btn-primary btn-block">Enviar tweet</button>
        </form>
    </div>
      
    <div class="col-6 m-auto">
        @foreach ($tweets as $tweet)
        
        {{$tweet->user->name}} - {{$tweet->comment}}<br>
        <hr>
        @endforeach

    </div>

    {{$tweets->links()}}

</div>
