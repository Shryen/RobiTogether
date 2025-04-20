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
}
