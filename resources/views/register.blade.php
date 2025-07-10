<x-admin>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="error">{{$error}}</p>
    @endforeach
@endif
@if (session('success'))
    <p>{{session('success')}}</p>
@endif
<form action="/register" method="POST">
    @csrf
    <div>
        <label for="name">Teljes neve</label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="password">Jelszó</label>
        <input type="password" name="password">
    </div>
    <input type="submit" value="Regisztráció">
</form>
</x-admin>