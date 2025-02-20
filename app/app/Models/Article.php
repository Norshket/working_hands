<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $views
 * @property int $likes
 * @property int $user_id
 *
 * @property-read Collection|ArticleComment[] $comments
 * @property-read Collection|Tag[] $tags
 *
 * @mixin Eloquent
 */
class Article extends Model implements HasMedia
{
    use HasFactory,
        SoftDeletes,
        InteractsWithMedia;

    protected $fillable = [
        'title',
        'content',
        'views',
        'likes'
    ];

    public function scopeLasted(Builder $query): void
    {
        $query->orderBy('created_at', 'desc')->limit(6);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(ArticleComment::class, 'article_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
    }

    public function hasAuthor(User $user): bool
    {
        return $this->user_id === $user->id;
    }
}
