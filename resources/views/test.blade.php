<html>
    <style>
        .table{
            display: grid;
            grid-template-columns: repeat(13, 1fr);
        }
        
        .table-cell{
            padding: 10px 8px;
            border: 1px solid #eee;
            text-align: center;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .table-header {
            font-weight: bold;
            background-color: #9d9d9d;
        }


    </style>

   <div class="table">
   {{-- first column first row corner should be empty so we can create a table --}}
        <div class="table-cell table-header"></div>

        {{-- printing all the months at the bottom --}}
        @foreach ($months as $month)
            <div class="table-cell table-header">
                {{$month}}
            </div>
        @endforeach

        {{-- printing all the subjects we have --}}
        @forelse ($subjects as $subject)
            <div class="table-cell">
                {{$subject->name}}
            </div>

            {{-- printing all the cells for the subject for each month --}}
            @foreach ($months as $currentMonth)
                @php
                // if there is no grades in the month have an empty array
                    $grades = $gradesByMonth[$subject->name][$currentMonth] ?? [];
                @endphp

                <div class="table-cell">
                    {{-- if the array not empty seperate all grades by a space --}}
                    @if (!empty($grades))
                        {{ implode(' ', $grades) }}     
                     @else
                    <p> </p>
                    @endif
                </div>
            @endforeach
        @empty
        <div class="table-cell" colspan="{{ count($months) + 1 }}">
            Nem talált tantárgyak.
        </div>
         @endforelse

   </div>
</html>