<?php

namespace App\Http\Controllers;


use App\Models\Tweet;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  

    /**
     * Show the form for creating a new resource.
     */
    public function create($tweetId)
    {
        $tweet = Tweet::findOrFail($tweetId);
        return view('comment.create', [
            'tweet' => $tweet
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
