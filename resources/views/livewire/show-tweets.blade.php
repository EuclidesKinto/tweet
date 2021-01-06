
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
        <section class="card-body mt-5">
            <!--1 tweet-->
            @foreach ($tweets as $tweet)
                <div>
                    <span>
                        <img class="img-tweet d-inline-flex" src="{{ asset('images/user.jpg') }}" alt="{{$tweet->user->name}}">
                    </span>
                    <strong >{{$tweet->user->name}}</strong>
                </div>
                <div class="mt-1 mb-3">
                    {{$tweet->comment}}
                </div>
                <div>
                    @if ($tweet->likes->count())
                        <a class="btn btn-danger btn-sm" href="" wire:click.prevent="deslike({{$tweet->id}})">Descurtir</a>
                    @else 
                        <a class="btn btn-primary btn-sm" href="" wire:click.prevent="like({{$tweet->id}})">Curtir</a>                        
                    @endif
                </div>
                <hr>                
            @endforeach            
        </section>
    </div>
    <div class="col-6 m-auto">
        {{$tweets->links()}}
    </div>


</div>
