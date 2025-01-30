<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;


/**
 * @property int $id
 * @property string $title
 *
 * @property-read  Collection|Article[] $articles
 *
 * @mixin Eloquent
 */
class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(
            Article::class,
            'article_tags',
            'tag_id',
            'article_id'
        );
    }
}
