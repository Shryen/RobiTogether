<x-layout title="{{$feed->title}}">
    <div class="feed-page">
        <div class="feed-page-side">
            <p>image placeholder</p>
            <p class="author">Létrehozta: Tünde néni!</p>
            <p class="time">{{$feed->created_at->diffForHumans()}}</p>
        </div>

        <div class="feed-page-content">
            <h1 class="title">{{$feed->title}}</h1>
            <p>{{$feed->content}}</p>

            <div class="go-back">
                <a href="/feeds">Vissza</a>

                @if(auth()?->user()?->name == "admin")

                <a href="/feed/{{$feed->id}}/edit">Edit</a>
                <form action="/feed/{{$feed->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete">
                </form>
                
                @endif

            </div>

        </div>
    </div>
    
</x-layout>