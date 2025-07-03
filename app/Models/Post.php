<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post){
            if(empty($post->slug)){
                $post->slug = Str::slug($post->title , '-');
            }
        });

        static::updating(function ($post){
            if($post->isDirty('title')){
                $post->slug = Str::slug($post->title, '-');
            }
        });
    }
}
