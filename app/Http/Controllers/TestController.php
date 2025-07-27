<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function test()
    {
        // elérési útvonal, tömb, 'változó' => érték
        $user = User::all();
        return view('test.test', [
            'test' => $user
        ]);
    }

    public function gradeTest()
    {
        // Getting logged in user
        $user = Auth::user();
        // block not logged in user since cannot fetch grades etc..
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        // fetch grades
        $grades = $user->grades;
        $Subjects = Subject::all();
        $months = [
            'jan',
            'feb',
            'mar',
            'apr',
            'may',
            'jun',
            'jul',
            'aug',
            'sep',
            'oct',
            'nov',
            'dec'
        ];

        // create a new array for grades by subject and month
        $gradesBySubjectAndMonth = [];

        foreach ($grades as $grade) {
            $subject = $grade->subject->name;
            $month = $grade->month;
            // associative array, using 2 keys, extra array for appending
            // for example
            /*
                $gradesBySubjectAndMonth[
                    'Math' => [
                        'jan' => [5,4],
                        'feb' => [3,1]
                    ]
                ]
            */
            $gradesBySubjectAndMonth[$subject][$month][] = $grade->grade;
        }

        return view('test', [
            'grades' => $grades,
            'Subjects' => $Subjects,
            'months' => $months,
            'gradesByMonth' => $gradesBySubjectAndMonth
        ]);
    }
}
