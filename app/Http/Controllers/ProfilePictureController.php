<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilePictureController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, User $user)
    {
        
        $request->validate([
            'profile_pic' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048']
        ]);

        $filePath = 'profile_pictures/default.jpg';

        if ($request->hasFile('profile_pic')) {
            $filePath = $request->file('profile_pic')->store('profile_pictures', 'public');
        }

        $user->update([
            'profile_pic' => $filePath
        ]);

        return redirect()->back();
    }
}
