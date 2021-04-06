<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsMasterAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Master Admon is using 12 
        if (auth()->user()->getAttributes()['adminId'] == 12) {
            return $next($request);
        }
        return redirect()
            ->route('admin.index')
            ->with('response', [
                'title' => "Keterbatasan Akses!",
                'text' => "Maaf, Anda mengakses sebuah resource yang tidak bisa diakses dengan role Anda!",
                'icon' => "error"
            ]);
    }
}
