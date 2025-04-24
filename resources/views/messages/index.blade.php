<x-layout title="Üzenetek">
    <h1>All messages</h1>
    <a href="/messages/create">Új üzenet</a>
    @foreach ($messages as $message)
    <a href="/message/{{$message->id}}">
        <div class="message-card">
            <p class="message-sender">{{$message->sender->name}}</p>
            <p class="message-time">{{$message->created_at->diffForHumans()}}</p>
            <p class="message-content">{{$message->content}}</p>
        </div>
    </a>
    @endforeach
</x-layout>