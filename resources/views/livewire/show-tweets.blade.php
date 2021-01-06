
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
                <div  class="btn-group">
                    @if ($tweet->likes->count())
                        <button class="btn btn-danger btn-sm" href="" wire:click.prevent="deslike({{$tweet->id}})">Descurtir</button>
                    @else 
                        <button class="btn btn-primary btn-sm" href="" wire:click.prevent="like({{$tweet->id}})">Curtir</button>                        
                    @endif
                </div>
                <hr>                
            @endforeach            
        </section>
        <div class="col-6 m-auto mb-5">
            {{$tweets->links()}}
        </div>
    </div>


</div>
