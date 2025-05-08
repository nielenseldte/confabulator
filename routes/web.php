<?php

use App\Models\Comment;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LikeController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DislikeController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\TrendingTweetsController;
use App\Http\Controllers\UserProfileController;

Route::redirect('/', '/tweets');

Route::resource('tweets', TweetController::class);

Route::get('/about', function() {
    return view('about');
});

// Route::get('/users/{user}', [ViewUserController::class, 'show']);
// Route::get('/users/{user}/edit', [ViewUserController::class, 'edit']);

Route::resource('users', UserProfileController::class)->only(['show', 'edit', 'update']);


Route::get('/trending', [TrendingTweetsController::class, 'index']);

Route::get('/users/{user}/feed', [FeedController::class, 'index']);

Route::resource('tweets.comments', CommentController::class)->only(['create', 'store', 'destroy']);


//Auth

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::delete('/logout', [SessionController::class, 'destroy']);

//Like and Dislike
Route::post('/tweets/{tweet}/like', [LikeController::class, 'store']);
Route::post('/tweets/{tweet}/dislike', [DislikeController::class, 'store']);

//Follow and Unfollow
Route::post('/users/{user}/follow', [FollowController::class, 'store']);
Route::delete('/users/{user}/unfollow', [FollowController::class, 'destroy']);
