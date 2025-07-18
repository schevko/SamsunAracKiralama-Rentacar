<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'image_path',
        'title',
        'description',
        'link',
        'order',
        'is_active'
    ];
}
