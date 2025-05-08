<?php

namespace App\Http\Controllers;


use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TweetController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            $tweets = Tweet::latest()->with(['user', 'likes', 'dislikes'])->withCount(['likes', 'dislikes'])->simplePaginate(5);
        } else{
            $tweets = Tweet::latest()
                ->with([
                    'user',
                    'likes' => function ($query) {
                        $query->where('user_id', Auth::user()->id);
                    },
                    'dislikes' => function ($query) {
                        $query->where('user_id', Auth::user()->id);
                    }
                ])
                ->withCount(['likes', 'dislikes'])
                ->simplePaginate(5);

        }

        

        return view('tweets.index', [
            'tweets' => $tweets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login');
        }
        return view('tweets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tweet' => ['required', 'min:2']
        ]);

        $user = Auth::user();

        $tweet = Tweet::create([
            'user_id' => $user->id,
            'body' => request('tweet')
        ]);

        Log::info('Tweet created by user', [
            'tweet_id' => $tweet->id,
            'user_id' => $user->id,
            'tweet_content' => $tweet->body
        ]);

        // redirect()->route('tweets.index');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {
        
        if (!Auth::check()) {
            $tweet->load(['user', 'comments.user', 'likes', 'dislikes'])->loadCount(['likes', 'dislikes']);
        }else {
            $tweet->load([
                'user',
                'comments.user',
                'likes' => function ($query) {
                    $query->where('user_id', Auth::user()->id);
                },
                'dislikes' => function ($query) {
                    $query->where('user_id', Auth::user()->id);
                }
            ])->loadCount(['likes', 'dislikes']);
        }
        
        return view('tweets.show', [
            'tweet' => $tweet
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tweet $tweet)
    {
        return view('tweets.edit', [
            'tweet' => $tweet
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tweet $tweet)
    {
        $this->authorize('edit-tweet', $tweet);
        $request->validate([
            'tweet' => ['required', 'min:2']
        ]);

        $tweet->update([
            'body' => request('tweet')
        ]);

        return redirect('/tweets/' . $tweet->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
    {
        Log::info('Tweet deleted by user', [
            'tweet_id' => $tweet->id,
            'user_id' => Auth::id(),
            'timestamp' => now()
        ]);
        $tweet->delete();
        return redirect('/tweets')->with('success', 'Tweet deleted successfully.');;
    }
}
