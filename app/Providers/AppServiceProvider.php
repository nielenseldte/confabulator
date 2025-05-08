<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Tweet;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard(true);
        Model::preventLazyLoading(! app()->isProduction());

        Gate::define('edit-tweet', function (User $user, Tweet $tweet) {
            return $user->id === $tweet->user_id;
        });

        Gate::define('delete-comment', function (User $user, Comment $comment) {
            return $user->id === $comment->user_id;
        });

        Gate::define('edit-profile', function(User $user, User $profileUser){
            return $user->id === $profileUser->id;
        });
    }
}
