<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tweet;
use App\Rules\NoProfanity;
use App\Rules\NoScriptTags;
use Illuminate\Http\Request;
use App\Rules\NoExternalLinks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserProfileController extends Controller
{
    use AuthorizesRequests;

    public function show(User $user)
    {
        if (!Auth::check()) {
            $tweets = Tweet::latest()->with(['user', 'likes', 'dislikes'])->withCount(['likes', 'dislikes'])->where('user_id', $user->id)->get();
        } else {
            $tweets = Tweet::latest()
                ->with([
                    'user',
                    'likes' => function ($query) {
                        $query->where('user_id', Auth::id());
                    },
                    'dislikes' => function ($query) {
                        $query->where('user_id', Auth::id());
                    }
                ])
                ->withCount(['likes', 'dislikes'])
                ->where('user_id', $user->id)
                ->get();
        }
        $user->loadCount(['tweets', 'followers', 'followedUsers']);
        return view('users.show', [
            'user' => $user,
            'tweets' => $tweets,
            'previousUrl' => url()->previous(),
            'currentUrl' => url()->current()
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $request->validate([
            'user_name' => ['required', 'min:2', new NoProfanity],
            'about' => ['max:350', new NoScriptTags, new NoProfanity, new NoExternalLinks]
        ]);

        
        $user->update([
            'user_name' => request('user_name'),
            'about' => request('about')
        ]);

        return redirect()->route('users.show', $user);
    }
}
