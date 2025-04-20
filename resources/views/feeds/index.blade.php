<x-layout title="Hirfolyam">
    <div class="feeds">

    @foreach ($feeds as $feed)
        <a href="/feed/{{$feed->id}}">
            <div class="feeds-card">

                    <div>
                        <p>Image Placeholder</p>
                    </div>

                    <div>
                        <h1>{{$feed->title}}</h1>
                        <p>Content</p>
                    </div>

            </div>
        </a>
    @endforeach

    </div>
</x-layout>