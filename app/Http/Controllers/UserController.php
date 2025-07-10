<?php

namespace App\Http\Controllers;
use App\Models\User;
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
