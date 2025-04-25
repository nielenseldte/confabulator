<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ViewUserController extends Controller
{
  
    public function show(User $user)
    {
        $user->loadCount(['tweets', 'followers']);
        return view('users.show', [
            'user' => $user
        ]);
    }

    
}
