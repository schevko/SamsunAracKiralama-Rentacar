<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'summary',
        'is_published',
        'published_at',
        'image_path',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
