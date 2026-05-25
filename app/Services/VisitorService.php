<?php

namespace App\Services;

use App\Models\VisitorLog;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class VisitorService
{
    /**
     * Durasi (menit) seorang pengunjung dianggap "online"
     */
    const ONLINE_MINUTES = 5;

    /**
     * Catat kunjungan. Dipanggil dari middleware.
     */
    public static function record(Request $request): void
    {
        // Abaikan bot dan request aset statis
        if (static::shouldIgnore($request)) {
            return;
        }

        $sessionId = session()->getId();
        $ip        = $request->ip();
        $page      = $request->path();
        $now       = Carbon::now();

        // Upsert: update last_seen_at jika session sudah ada, insert jika belum
        VisitorLog::updateOrCreate(
            ['session_id' => $sessionId],
            [
                'ip_address'  => $ip,
                'page'        => $page,
                'last_seen_at'=> $now,
            ]
        );

        // Bust cache stats agar widget refresh
        Cache::forget('visitor_stats');
    }

    /**
     * Ambil semua statistik (cached 1 menit)
     */
    public static function stats(): array
    {
        return Cache::remember('visitor_stats', 60, function () {
            $onlineThreshold = Carbon::now()->subMinutes(static::ONLINE_MINUTES);
            $todayStart      = Carbon::today();

            return [
                'online' => VisitorLog::where('last_seen_at', '>=', $onlineThreshold)->count(),
                'today'  => VisitorLog::where('created_at', '>=', $todayStart)->count(),
                'total'  => VisitorLog::count(),
            ];
        });
    }

    /**
     * Tentukan apakah request ini harus diabaikan
     */
    private static function shouldIgnore(Request $request): bool
    {
        // Abaikan Filament admin panel
        if (str_starts_with($request->path(), 'admin')) {
            return true;
        }

        // Abaikan endpoint health check
        if ($request->path() === 'up') {
            return true;
        }

        // Abaikan bot berdasarkan User-Agent
        $botPatterns = ['bot', 'crawler', 'spider', 'slurp', 'bingbot', 'googlebot'];
        $userAgent   = strtolower($request->userAgent() ?? '');
        foreach ($botPatterns as $pattern) {
            if (str_contains($userAgent, $pattern)) {
                return true;
            }
        }

        return false;
    }
}
