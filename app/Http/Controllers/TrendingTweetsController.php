<?php

namespace App\Http\Controllers;


use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrendingTweetsController extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            $tweets = Tweet::trending()->with(['likes', 'dislikes', 'user'])->withCount(['likes', 'dislikes'])->simplePaginate(5);
        } else {
            $tweets = Tweet::trending()->with([
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
        return view('trending.index', compact('tweets'));
    }
}
