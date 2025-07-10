<style>
    body,html{
        display: flex;
        flex-direction: column;
        width: 100vw;
        height: 100%;
        justify-content: center;
        align-items: center;
        background-color: #295d9a;
        font-size: 18pt;
    }

    form{
        border: 1px solid black;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        padding: 1rem;
        background-color: whitesmoke;
        min-width: 350px;
        border-radius: 10px;
    }

    form > div {
        display: flex;
        flex-direction: column;
        padding: .5rem 0;
        line-height: 1.5;
    }

    label{
        font-weight: 800;
    }

    input{
        display: flex;
        padding: .4rem .2rem;
        border-radius: 5px;
        border: 1px solid black;
    }

    .button{
        background-color: #4A90E2;
        transition: all .2s ease-in;
        cursor: pointer;
        margin: 0 auto;
        color: whitesmoke;
        padding: .6rem .4rem;
        font-size: 14pt;
        font-weight: bold;
        margin-top: 1rem;
    }

    .button:hover{
        background-color: #295d9a;
    }

    h1{
        text-align: center;
        font-size: 20pt;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bejelentkezés</title>
</head>
<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
    <form action="/login" method="POST">
        <h1>Bejelentkezés</h1>
        @csrf
        <div>
            <label for="loginId">Azonositó</label>
            <input type="text" name="loginId">
        </div>
        <div>
            <label for="password">Jelszó</label>
            <input type="password" name="password">
        </div>
        <input type="submit" value="Bejelentkezés" class="button">
    </form>
</body>
</html>