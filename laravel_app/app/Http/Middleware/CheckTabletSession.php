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
        $sessionId = $request->cookie('tableSessionId');

        if ($sessionId) {
            $table = Table::where('session_id', $sessionId)
                        ->where('session_expires_at', '>', now())
                        ->first();

            if ($table) {
                return $next($request);
            }
        }
        $data = [
            'sessionId' => $sessionId,
            'error' => 'セッションが無効です',
            'success' => false,
            'next' => $next,
            'request' => $request,
        ];    
        return redirect()->route('client.setup.index')->with('error', 'セッションが無効です');
        // return response()->json($data);
    }
}