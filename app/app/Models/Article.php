<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory,
        SoftDeletes;

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
}
