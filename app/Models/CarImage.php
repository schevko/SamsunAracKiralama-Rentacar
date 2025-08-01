<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CarImage extends Model
{
    protected $fillable = [
        'car_id',
        'path',
        'paths',
        'is_thumbnail',
        'order',
    ];
    protected $casts = [
        'paths' => 'array', // JSON olarak saklanacak
        'is_thumbnail' => 'boolean',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }


    /**
     * Belirtilen boyutta ve formatta resim URL'sini döndürür.
     *
     * @param string $size 'original', 'large', 'medium', 'thumbnail'
     * @param string $format 'webp' veya orjinal format
     * @return string
     */
    public function getUrl($size = 'original', $format = null)
    {
        $key = $format ? "{$size}_{$format}" : $size;

        if ($this->paths && isset($this->paths[$key])) {
            return Storage::url($this->paths[$key]);
        }

        // Fallback: Eğer istenen format/boyut yoksa orjinalini döndür
        if ($this->paths && isset($this->paths['original'])) {
            return Storage::url($this->paths['original']);
        }

        // En son çare
        return Storage::url($this->path);
    }
}
