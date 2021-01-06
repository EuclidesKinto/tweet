<div>
    @foreach ($tweets as $tweet)
    
    {{$tweet->user->name}} - {{$tweet->comment}}
    @endforeach
</div>
