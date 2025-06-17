<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carİmage extends Model
{
    protected $fillable = [
        'car_id',
        'path',
        'is_thumbnail',
        'order',
    ];
}
