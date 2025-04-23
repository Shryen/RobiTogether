<x-layout title="Üzenetek">
    <h1>All messages</h1>
    <a href="/messages/create">Új üzenet</a>
    @foreach ($messages as $message)
        <div>
            <p>{{$message->sender}}</p>
            <p>{{$message->receiver}}</p>
            <p>{{$message->sender}}</p>
        </div>
    @endforeach
</x-layout>