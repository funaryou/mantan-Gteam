<?php

namespace App\Http\Middleware;

use App\Models\Table;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CheckTabletSession
{
    public function handle(Request $request, Closure $next): Response
    {
        $sessionId = $request->cookie('table_session_id');

        if ($sessionId) {
            $table = Table::where('session_id', $sessionId)
                        ->where('session_expires_at', '>', now())
                        ->first();

            if ($table) {
                return $next($request);
            }
        }

        // セッションが無効なら開始ページへリダイレクト
        return redirect()->route('client.setup.index')->with('error', 'セッションが無効です');
    }
}