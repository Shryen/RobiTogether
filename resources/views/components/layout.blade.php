<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/nav.css')}}">
    <title>E-napló | {{$title}}</title>
</head>
<body>
    <nav>
        <a href="/">Home Page</a>
        <a href="/feeds">Feeds</a>
    </nav>
    <div class="content">
        {{$slot}}
    </div>
</body>
</html>