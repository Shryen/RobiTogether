<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $messages = Messages::where('sender', $user->name)
            ->orWhere('receiver', $user->name)
            ->orderBy('created_at', 'asc')
            ->get();
        return view('messages.index', [
            'messages' => $messages
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('messages.create', [
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = $request->validate([
            'sender' => 'required|max:255',
            'receiver' => 'required|max:255',
            'content' => 'required|max:255'
        ]);
        Messages::create($message);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Messages $messages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Messages $messages)
    {
        //
    }
}
