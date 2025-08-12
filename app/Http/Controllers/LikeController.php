<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Tweet $tweet)
    {
        $user = Auth::user();
        $tweet_id = $tweet->id;

        if (!$user) {
            return redirect('/login');
        }

        if (!$user->hasLiked($tweet)) {
            if ($user->hasDisliked($tweet)) {
                $user->dislikes()->where('tweet_id', '=', $tweet->id)->delete();
            }
            $user->likes()->create(['tweet_id' => $tweet->id]);

            return redirect()->back()->withFragment('tweet-' . $tweet->id);
        } else {
            $user->likes()->where('tweet_id', '=', $tweet_id)->delete();
            return redirect()->back()->withFragment('tweet-' . $tweet->id);
        }
    }
}
