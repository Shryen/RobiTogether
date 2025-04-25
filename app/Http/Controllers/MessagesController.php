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
        $messages = Messages::where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $conversations = $messages->unique(function ($message) {
            $ids = [$message->sender_id, $message->receiver_id];
            sort($ids);
            return implode('-', $ids);
        });
        return view('messages.index', [
            'messages' => $conversations
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
            'sender_id' => 'required',
            'receiver_id' => 'required',
            'content' => 'required|max:255'
        ]);
        Messages::create($message);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $userID = auth()->user()->id;
        $messages = Messages::where(function ($query) use ($userID, $id) {
            $query->where('sender_id', $userID)
                ->where('receiver_id', $id);
        })->orWhere(function ($query) use ($userID, $id) {
            $query->where('sender_id', $id)
                ->where('receiver_id', $userID);
        })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('messages.show', [
            'messages' => $messages,
            'id' => $id,
        ]);
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
