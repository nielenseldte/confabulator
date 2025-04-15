<?php

namespace App\Http\Controllers;


use App\Models\Tweet;
use Illuminate\Http\Request;

class TrendingTweetsController extends Controller
{
   
    public function index()
    {
        $tweets = Tweet::trending()->simplePaginate(5);
        return view('trending.index', [
            'tweets' => $tweets
        ]);
    }



   
}
