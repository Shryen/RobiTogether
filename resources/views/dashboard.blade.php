<x-layout title="Kezdőlap">
    <h1>Szia {{auth()->user()->name}}</h1>
<form action="/logout" method="post">
    @csrf
    <button type="submit">Kijelentkezés</button>
</form> 
</x-layout>