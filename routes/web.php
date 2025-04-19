<?php

use App\Models\Comment;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TweetController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ViewUserController;
use App\Http\Controllers\TrendingTweetsController;

Route::redirect('/', '/tweets');

Route::resource('tweets', TweetController::class);

Route::get('/about', function() {
    return view('about');
});

Route::get('/users/{user}', [ViewUserController::class, 'show']);

Route::get('/trending', [TrendingTweetsController::class, 'index']);

Route::get('/tweets/{tweet}/comments/create', [CommentController::class, 'create']);

//Auth

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::delete('/logout', [SessionController::class, 'destroy']);