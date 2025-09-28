<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AiBlogLimit extends Model
{
    protected $fillable = [
        'user_id',
        'month_year',
        'usage_count',
        'monthly_limit'
    ];

    // User ilişkisi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mevcut ay için kullanıcının limitini kontrol et veya oluştur
     */
    public static function getCurrentMonthLimit($userId = null)
    {
        $userId = $userId ?? Auth::id();
        $currentMonth = Carbon::now()->format('Y-m');

        return self::firstOrCreate(
            ['user_id' => $userId, 'month_year' => $currentMonth],
            ['usage_count' => 0, 'monthly_limit' => 20]
        );
    }

    /**
     * Kullanıcının mevcut ay için kalan hakkını kontrol et
     */
    public static function getRemainingUsage($userId = null)
    {
        $limit = self::getCurrentMonthLimit($userId);
        return max(0, $limit->monthly_limit - $limit->usage_count);
    }

    /**
     * Kullanıcının limitinin dolup dolmadığını kontrol et
     */
    public static function hasExceededLimit($userId = null)
    {
        return self::getRemainingUsage($userId) <= 0;
    }

    /**
     * Kullanım sayısını artır
     */
    public static function incrementUsage($userId = null)
    {
        $limit = self::getCurrentMonthLimit($userId);
        $limit->increment('usage_count');
        return $limit;
    }

    /**
     * Kullanıcının mevcut durumunu getir
     */
    public static function getUsageStatus($userId = null)
    {
        $limit = self::getCurrentMonthLimit($userId);
        return [
            'used' => $limit->usage_count,
            'limit' => $limit->monthly_limit,
            'remaining' => max(0, $limit->monthly_limit - $limit->usage_count),
            'exceeded' => $limit->usage_count >= $limit->monthly_limit,
            'month' => $limit->month_year
        ];
    }
}
