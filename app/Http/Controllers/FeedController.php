<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        if (Auth::user()->id === $user->id) {
            $tweets = Tweet::feed($user)->with([
                'user',
                'likes' => function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                },
                'dislikes' => function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                }
            ])
                ->latest()
                ->withCount(['likes', 'dislikes'])
                ->simplePaginate(5);


            return view('feed.index', [
                'tweets' => $tweets
            ]);
        } else {
            abort(403);
        }
    }
}
