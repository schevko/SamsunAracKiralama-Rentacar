<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AiBlogLimit extends Model
{
    protected $fillable = [
        'user_id',
        'month',
        'usage_count'
    ];

    const MONTHLY_LIMIT = 20;

    // User ilişkisi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Sistem geneli kullanım durumunu al
     */
    public static function getSystemWideUsageStatus()
    {
        $currentMonth = Carbon::now()->format('Y-m');

        $record = self::where('month', $currentMonth)
                     ->whereNull('user_id') // Sistem geneli kayıt
                     ->first();

        $used = $record ? $record->usage_count : 0;
        $limit = self::MONTHLY_LIMIT;
        $remaining = max(0, $limit - $used);

        return [
            'used' => $used,
            'limit' => $limit,
            'remaining' => $remaining,
            'exceeded' => $used >= $limit,
            'month' => $currentMonth
        ];
    }

    /**
     * Sistem geneli limit aşıldı mı?
     */
    public static function hasSystemWideExceededLimit()
    {
        $status = self::getSystemWideUsageStatus();
        return $status['exceeded'];
    }

    /**
     * Sistem geneli kullanımı artır
     */
    public static function incrementSystemWideUsage()
    {
        $currentMonth = Carbon::now()->format('Y-m');

        $record = self::firstOrCreate(
            [
                'user_id' => null, // Sistem geneli
                'month' => $currentMonth
            ],
            [
                'usage_count' => 0
            ]
        );

        $record->increment('usage_count');

        return $record;
    }

    // Eski metodlar (backward compatibility için)
    public static function getUsageStatus()
    {
        return self::getSystemWideUsageStatus();
    }

    public static function hasExceededLimit()
    {
        return self::hasSystemWideExceededLimit();
    }

    public static function incrementUsage()
    {
        return self::incrementSystemWideUsage();
    }

    /**
     * Mevcut ay için kullanıcının limitini kontrol et veya oluştur
     */
    public static function getCurrentMonthLimit($userId = null)
    {
        $userId = $userId ?? Auth::id();
        $currentMonth = Carbon::now()->format('Y-m');

        return self::firstOrCreate(
            ['user_id' => $userId, 'month' => $currentMonth],
            ['usage_count' => 0]
        );
    }

    /**
     * Kullanıcının mevcut ay için kalan hakkını kontrol et
     */
    public static function getRemainingUsage($userId = null)
    {
        $status = self::getSystemWideUsageStatus();
        return $status['remaining'];
    }
}
