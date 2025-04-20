<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regisztráció</title>
</head>
<body>
    <form action="/register" method="POST">
        @csrf
        <div>
            <label for="name">Név</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="email">E-mail</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="password">Jelszó</label>
            <input type="password" name="password">
        </div>
        <input type="submit" value="Regisztráció">
    </form>
</body>
</html>