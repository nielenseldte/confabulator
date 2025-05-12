<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\Dislike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class DislikeController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tweet $tweet)
    {
        $user = Auth::user();
        $tweet_id = $tweet->id;

        if (!$user) {
            return redirect('/login');
        }

        if (!$user->hasDisliked($tweet)) {
            if ($user->hasLiked($tweet)) {
                $user->likes()->where('tweet_id', '=', $tweet->id)->delete();
            }
            $user->dislikes()->create(['tweet_id' => $tweet->id]);

            return redirect()->back()->withFragment('tweet-' . $tweet->id);
        } else {
            $user->dislikes()->where('tweet_id', '=', $tweet_id)->delete();
            return redirect()->back()->withFragment('tweet-' . $tweet->id);
        }
    }
}
