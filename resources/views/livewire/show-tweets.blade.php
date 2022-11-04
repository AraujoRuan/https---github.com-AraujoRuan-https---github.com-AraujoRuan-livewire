<div>
    Show Tweets

    <p>{{ $content}}</p>

    <form method="get" wire:submit.prevent="create">
        <input type="text" name="content" id="content"  wire:model="content">
        @error('content') {{$message}} @enderror
        <button type="submit">Criar Tweet</button>
    </form>

    <hr> 

    @foreach ($tweets as $tweet)
        @if ($tweet->user->photo)

        @else
           <img src="{{ url('imgs/no-image.png')}}" alt="{{ $tweets->user->name }}">
        @endif
        {{$tweet->user->name}} - {{$tweet->content}} 
        @if($tweet->likes->count())
           <a href="#" wire:click.prevent="unilike({{ $tweet->id }})">Descurtir</a>
        @else
            <a href="#" wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
        @endif       
        <br>
    @endforeach

    <hr>

    <div>
        {{$tweets->links()}}
    </div>
</div>
