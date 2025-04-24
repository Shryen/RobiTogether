<x-layout title="Üzenetek">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
    <form action="/messages/store" method="post" class="message-form">
        @csrf
        <input type="hidden" name="sender_id" value="{{auth()->user()->id}}">
        <label for="receiver">Cimzett</label>
        <select name="receiver_id">
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        <label for="content">Üzenet</label>
        <textarea name="content" placeholder="Ird ide az üzenetet!"></textarea>
        <input type="submit" value="Küldés" id="send-button">
    </form>
</x-layout>