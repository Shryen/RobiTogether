<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    public function validationTest(Request $request)
    {
        $validation = $request->validate([
            'number1' => 'required',
            'number2' => 'required'
        ]);
        $sum = $validation['number1'] + $validation['number2'];
        return $sum;
    }
}
