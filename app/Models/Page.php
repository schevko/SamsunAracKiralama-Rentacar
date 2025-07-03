<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'is_active'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($page){
            if(empty($page->slug)){
                $page->slug = Str::slug($page->title ,'-');
            }
        });

        static::updating(function ($page){
            if($page->isDirty('title')){
                $page->slug = Str::slug($page->title ,'-');
            }
        });
    }
}
