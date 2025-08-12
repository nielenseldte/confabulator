<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'q' => ['required']
        ]);

        $query = request('q');


        $users = User::latest()->where('user_name', 'like', '%' . $query . '%')->simplePaginate(5);

        return view('users.index', compact('users', 'query'));
    }
}
