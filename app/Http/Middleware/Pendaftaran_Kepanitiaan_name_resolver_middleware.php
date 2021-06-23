<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Pendaftaran_Kepanitiaan_name_resolver_middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $eventName = "Testing")
    {
        $allowed_segment = [
            'open-tender',
            'pendaftaran-kepanitiaan',
            'pendaftaran-event'
        ];
        $url_segment = $request->segment(1);
        return response()->json([
            'eventName' => $eventName
        ]);
        // If it's in allowed routes, then passed to next closure
        if (in_array($url_segment, $allowed_segment)) {
            return $next($request);
        }
        return redirect()->route('guest.landing.page');
    }
}
