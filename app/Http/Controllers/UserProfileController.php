<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    use AuthorizesRequests;

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
        $this->authorize('edit-profile', $user);
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('edit-profile', $user);
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
