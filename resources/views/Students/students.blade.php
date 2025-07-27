<x-admin>
    @foreach ($students as $student)
        <a href="/students/{{$student->id}}">{{$student->name}}</a>
    @endforeach
</x-admin>