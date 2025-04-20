<x-layout title="Hirfolyam létrehozása">
    <form action="/feeds/store" method="post">
        @csrf

        <div>
            <label for="title">Cim</label>
            <input type="text" name="title">
        </div>
        <div>
            <label for="category">Kategória</label>
            <input type="text" name="category">
        </div>
        <div>
            <label for="content">Tartalom</label>
            <textarea name="content"></textarea>
        </div>
        <input type="submit" value="Létrehozás">
    </form>
</x-layout>