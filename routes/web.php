<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DislikeController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfilePictureController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\TrendingTweetsController;
use App\Http\Controllers\UserProfileController;

Route::redirect('/', '/tweets');
Route::view('/about', 'about');

//Resource Controllers
// Public routes
Route::resource('tweets', TweetController::class);

Route::resource('users', UserProfileController::class)->only('show');
Route::resource('users', UserProfileController::class)
    ->only(['edit', 'update'])
    ->middleware('auth');
Route::patch('/users/{user}/profile-picture', ProfilePictureController::class);

Route::resource('tweets.comments', CommentController::class)
    ->only(['create', 'store'])
    ->middleware('auth');
Route::resource('tweets.comments', CommentController::class)
    ->only('destroy')
    ->middleware('auth');

//Trending Tweets
Route::get('/trending', [TrendingTweetsController::class, 'index']);

//User feeds
Route::get('/users/{user}/feed', [FeedController::class, 'index'])->middleware('auth');

//Auth 
Route::middleware('guest')->group( function() {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);

});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');

//Like and Dislike
Route::post('/tweets/{tweet}/like', [LikeController::class, 'store'])->name('tweets.like')->middleware('auth');
Route::post('/tweets/{tweet}/dislike', [DislikeController::class, 'store'])->name('tweets.dislike')->middleware('auth');

//Follow and Unfollow
Route::post('/users/{user}/follow', [FollowController::class, 'store'])->name('user.follow')->middleware('auth');
Route::delete('/users/{user}/unfollow', [FollowController::class, 'destroy'])->name('user.unfollow')->middleware('auth');
