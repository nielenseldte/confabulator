<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create(Tweet $tweet)
    {
        if (!Auth::check()) {
            return redirect('/login');
        } else {
            $tweet->load([
                'user',
                'likes' => function ($query) {
                    $query->where('user_id', Auth::user()->id);
                },
                'dislikes' => function ($query) {
                    $query->where('user_id', Auth::user()->id);
                }
            ])->loadCount(['likes', 'dislikes']);
        }

        return view('comments.create', [
            'tweet' => $tweet
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tweet $tweet)
    {
        $request->validate([
            'comment' => ['required']
        ]);

        $user = Auth::user();
        Comment::create([
            'user_id' => $user->id,
            'tweet_id' => $tweet->id,
            'content' => request('comment')
        ]);
        return redirect('/tweets/' . $tweet->id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet, Comment $comment)
    {
        Log::info('DELETE request URL:', ['url' => request()->fullUrl()]);

        if (!Gate::allows('delete-comment', $comment)) {
            abort(403);
        }
        

        $comment->delete();
        Log::info('Comment deleted by user', [
            'comment_id' => $comment->id,
            'user_id' => Auth::id(),
            'timestamp' => now()
        ]);

        return redirect()->route('tweets.show', ['tweet' => $tweet->id]);
    }
}
