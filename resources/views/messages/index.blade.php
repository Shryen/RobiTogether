<x-layout title="Üzenetek">
    <h1>All messages</h1>
    <a href="/messages/create">Új üzenet</a>
    @foreach ($messages as $message)
    @php
        $otherUser = $message->sender_id === auth()->id() ? $message->receiver : $message->sender;
    @endphp
    <a href="/message/{{ $otherUser->id }}">
        <div class="message-card">
            <p class="message-sender">{{ $otherUser->name }}</p>
            <p class="message-time">{{ $message->created_at->diffForHumans() }}</p>
            <p class="message-content">{{ $message->content }}</p>
        </div>
    </a>
    @endforeach
</x-layout>