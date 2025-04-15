<?php

namespace Database\Factories;

use Exception;
use App\Models\User;
use App\Models\Dislike;
use App\Models\Tweet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dislike>
 */
class DislikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        static $created = [];
        $maxAttempts = 100;
        $attempts = 0;
        $alreadyExists = true;
        $tweet_id = null;
        $user_id = null;

        while ($alreadyExists && $attempts < $maxAttempts) {
            $tweet_id = Tweet::pluck('id')->random();
            $user_id = User::pluck('id')->random();
            $key = $user_id . '-' . $tweet_id;

            $alreadyExists = in_array($key, $created) ||
                Dislike::where('user_id', $user_id)
                ->where('tweet_id', $tweet_id)
                ->exists();

            $attempts++;
        }

        if ($alreadyExists) {
            throw new \Exception("Could not find a unique combination after $maxAttempts attempts");
        }

        $created[] = $user_id . '-' . $tweet_id;

        return [
            'tweet_id' => $tweet_id,
            'user_id' => $user_id,
        ];
    }
}
