<?php

namespace App\Http\Controllers;

use App\Models\Feeds;
use Illuminate\Http\Request;

class FeedsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // SELECT * from Feeds
        $feeds = Feeds::all();
        // view('elérési útvonal', [ 'változónév' => 'érték' ])
        return view('feeds.index', [
            'feeds' => $feeds
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('feeds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'title' => "required|max:255",
            'category' => "required|max:255",
            'content' => "required"
        ]);
        Feeds::create($credentials);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $feed = Feeds::where('id', $id)->first();
        return view('feeds.show', [
            'feed' => $feed
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $feed = Feeds::where('id', $id)->first();
        return view('feeds.edit', [
            'feed' => $feed
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $feed = Feeds::findOrFail($id);
        $update = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|max:255',
            'content' => 'required'
        ]);
        $feed->update($update);
        return redirect('/feeds');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Feeds::destroy($id);
        return redirect('/feeds');
    }
}
