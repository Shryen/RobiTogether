
<!-- Layoutok esetén a változónak úgy adunk értéket, hogy változó="érték" -->
<x-layout title="Info: {{$Student->name}}">
    <div class="student-info">

        <h2 style="text-align: center">{{$Student->name}}</h2>

        <div class="table">
        {{-- Első sor első oszlop üres --}}
        <div class="table-cell table-header"></div>

        {{-- Kiírjuk az összes hónap nevét, ez lesz a header --}}
        @foreach ($months as $month)
            <div class="table-cell table-header">
                {{$month}}
            </div>
        @endforeach

        {{-- Kiírjuk az összes tantárgyat (forelse annak az esetén ha nem lenne tantárgya) --}}
        @forelse ($Subjects as $subject)
            <div class="table-cell">
                {{$subject->name}}
            </div>

            {{-- Kiírjuk az összes hónapban az adott jegyeket --}}
            @foreach ($months as $currentMonth)
                @php
                // Ha nincs az adott hónapban jegy legyen a tömb üres
                    $grades = $gradesByMonth[$subject->name][$currentMonth] ?? [];
                @endphp

                <div class="table-cell">
                    {{-- Ha nem üres a tömbb az összes jegyet elválasztjuk szóközzel --}}
                    @if (!empty($grades))
                       @foreach ($Grades as $grade)
                           <a href="/grade/{{$grade->id}}/edit">{{$grade->grade}}</a>
                       @endforeach   
                     @else
                    <p> </p>
                    @endif
                </div>
            @endforeach
        @empty {{-- Ha nincs tantárgya írja ki hogy nincs! --}}
        <div class="table-cell" colspan="{{ count($months) + 1 }}">
            Nem talált tantárgyak.
        </div>
        @endforelse
        </div>
    </div>
</x-layout>