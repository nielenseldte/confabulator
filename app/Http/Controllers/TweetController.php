<?php

namespace App\Http\Controllers;


use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tweets = Tweet::latest()->with(['user', 'likes', 'dislikes'])->withCount(['likes', 'dislikes'])->simplePaginate(5);

        return view('tweets.index', [
            'tweets' => $tweets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tweets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {
        $tweet->load(['user', 'comments.user', 'likes', 'dislikes'])->loadCount(['likes', 'dislikes']);
        
        return view('tweets.show', [
            'tweet' => $tweet,
            'comments' => $tweet->comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tweet $tweets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tweet $tweets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweets)
    {
        //
    }
}
