{{$test[0]}}

<form action="/test/validation" method="post">
    @csrf
    <input type="number" name="number1">
    <input type="number" name="number2">
    <input type="submit" value="Összead">
</form>