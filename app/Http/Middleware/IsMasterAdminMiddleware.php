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
        if(auth()->user()->adminId == 11){
            return $next($request);
        }
        return redirect()->route('admin.index');
    }
}
