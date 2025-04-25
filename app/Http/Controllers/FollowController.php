<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user)
    {
        $authed_user = Auth::user();
        
        if ($authed_user) {
            $authed_user->followedUsers()->attach($user->id);
            return redirect()->back();
        }else {
            return redirect('/login');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $authed_user = Auth::user();
        
        if ($authed_user) {
            $authed_user->followedUsers()->detach($user->id);
            return redirect()->back();
        }else {
            return redirect('/login');
        }
    }
}
