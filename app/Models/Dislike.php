<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * 
 *
 * @property int $id
 * @property int $twat_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Twat $twat
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\DislikeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dislike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dislike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dislike query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dislike whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dislike whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dislike whereTwatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dislike whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dislike whereUserId($value)
 * @property int $tweet_id
 * @property-read \App\Models\Tweet $tweet
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dislike whereTweetId($value)
 * @mixin \Eloquent
 */
class Dislike extends Model
{
    /** @use HasFactory<\Database\Factories\DislikeFactory> */
    use HasFactory;
    
    public function tweet(): BelongsTo
    {
        return $this->belongsTo(Tweet::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
