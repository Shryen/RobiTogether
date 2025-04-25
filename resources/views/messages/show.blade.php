@php
    use Carbon\Carbon;
    Carbon::setLocale('hu');
@endphp
<x-layout title="Üzenetek">
    <div class="chat-content">
        @foreach ($messages as $message)
            @php
                $thisUser = $message->sender_id === auth()->id();
                $style = $thisUser ? "float: right;" : "float: left;";
                $formatedTime = Carbon::parse($message->created_at)->translatedFormat('Y F j, H:m');
            @endphp
            <div class="chat-row">
                <div class="chat-text" style="{{$style}}">
                    <p class="chat-time">{{$formatedTime}}</p>
                    <strong>{{ $message->sender->name }}</strong>
                    <p>{{ $message->content }}</p>
                </div>
            </div>
        
        @endforeach
        <form method="post" action="/message/{{$id}}}/sendmessage" class="chat-box">
            <input class="chat-text-box" type="text" name="chat">
            <input class="chat-button" type="submit" value=">">
        </form>
    </div>
</x-layout>