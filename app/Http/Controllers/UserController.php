<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'password' => 'required|max:255',
            'loginId'
        ]);

        $name = explode(' ', $validated['name']);
        $nameFirstPart = str_split($name[0], 2);
        $nameSecondPart = str_split($name[1], 4);
        $randNum = rand(0, 100);

        $validated['loginId'] = $nameFirstPart[0] . $nameSecondPart[0] . $randNum;

        $validated['password'] = Hash::make($validated['password']);

        User::create([
            'name' => $validated['name'],
            'password' => $validated['password'],
            'loginId' => $validated['loginId']
        ]);

        return back()->with('success', 'Diák sikeresen hozzáadva!, Felhasználónév: ' . $validated['loginId']);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'loginId' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'loginId' => 'A megadott adatok nem egyeznek a rekordjainkkal.',
        ])->onlyInput('loginId');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function AllStudents()
    {
        $Students = User::where('role', 'student')->get();
        return view('students.students', data: [
            'students' => $Students
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Létrehozunk egy változót, Model class segítségével meghívjuk a where functiont első paraméter az oszlop a
        //  második pedig amit keresünk pl.: id, majd a get() functionnel a végén lekérjük az adatot
        // A first() function csak egy objektumot fog visszaadni míg a get() egy tömbböt, tömbre most nincs szükségünk
        $Student = User::where('id', $id)->first();
        // miután megszereztük a szükséges adatot returnöljük az adott view-t, az első paraméter az elérési útvonal
        // Mappa + filename a második paraméter az értékek amiket át akarunk adni jelen esetben a student változó
        // Az adott értéket úgy adjuk át hogy elsőnek elnevezzük a változót, amit meg akarunk hívni a view-ban
        // utána hozzápárosítjuk az értéket a => operátorral
        // Például: 'student' => $Student
        $Grades = $Student->grades;
        $Subjects = Subject::all();
        $months = [
            'Január',
            'Február',
            'Március',
            'Április',
            'Május',
            'Június',
            'Július',
            'Augusztus',
            'Szeptember',
            'Október',
            'November',
            'December'
        ];

        $gradesByMonthAndSubject = [];

        foreach ($Grades as $grade) {
            // Adunk az asszociatív tömbnek 2 kulcsot month és a subject és egy értéket ami a grade 
            // A harmadik [] azt jelenti hogy hozzáadjuk a $Grades tömbbön átfutott értékeket
            // Ehhez az asszociatív tömbhöz
            /*
             *   $gradesByMonthAndSubject[
             *   'Matek' =* 
             *      'január' = [5,4],
             *      'február' = [5]
             *    ];
             */
            $Subject = $grade->subject->name;
            $month = $grade->month;
            $gradesByMonthAndSubject[$Subject][$month][] = $grade->grade;
        }



        return view("Students.show", [
            'Student' => $Student,
            'months' => $months,
            'Subjects' => $Subjects,
            'Grades' => $Grades,
            'gradesByMonth' => $gradesByMonthAndSubject
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
