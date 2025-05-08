<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
  
    public function show(User $user)
    {
        $user->loadCount(['tweets', 'followers', 'followedUsers']);
        //dd($user->toArray());
        return view('users.show', [
            'user' => $user,
            'previousUrl' => url()->previous(),
            'currentUrl' => url()->current()
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'user_name' => ['required', 'min:2'],
        ]);

        $user->update([
            'user_name' => request('user_name'),
            'about' => request('about')
        ]);

        return redirect('/users/' . $user->id);
    }

    
}
