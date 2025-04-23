<x-layout title="Üzenetek">
    <form action="/messages/store" method="post" class="message-form">
        @csrf
        <input type="hidden" name="sender" value="{{auth()->user()->name}}">
        <label for="receiver">Cimzett</label>
        <select name="receiver">
            @foreach ($users as $user)
                <option value="{{$user->name}}">{{$user->name}}</option>
            @endforeach
        </select>
        <label for="content">Üzenet</label>
        <textarea name="content" placeholder="Ird ide az üzenetet!"></textarea>
        <input type="submit" value="Küldés" id="send-button">
    </form>
</x-layout>