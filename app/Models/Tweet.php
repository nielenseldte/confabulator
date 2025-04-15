<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Dislike> $dislikes
 * @property-read int|null $dislikes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Like> $likes
 * @property-read int|null $likes_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\TwatFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Twat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Twat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Twat query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Twat whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Twat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Twat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Twat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Twat whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder with(array|string $relations)
 * @mixin \Eloquent
 */
class Tweet extends Model
{
    /** @use HasFactory<\Database\Factories\TwatsFactory> */
    use HasFactory;

    #[Scope]
    protected function trending(Builder $query): void
    {
        $query->with(['user', 'likes', 'dislikes'])->withCount(['likes', 'dislikes'])->whereRaw('(likes_count + dislikes_count) > ?', [10])->orderByRaw('likes_count + dislikes_count DESC');
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function dislikes(): HasMany
    {
        return $this->hasMany(Dislike::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
