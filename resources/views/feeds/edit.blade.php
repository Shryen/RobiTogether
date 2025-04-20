<x-layout title="Hirfolyam szerkesztése">
    <form action="/feed/{{$feed->id}}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Cim</label>
            <input type="text" name="title" value="{{$feed->title}}">
        </div>
        <div>
            <label for="category">Kategória</label>
            <input type="text" name="category" value="{{$feed->category}}">
        </div>
        <div>
            <label for="content">Tartalom</label>
            <textarea name="content">{{$feed->content}}</textarea>
        </div>
        <input type="submit" value="Létrehozás">
    </form>
</x-layout>