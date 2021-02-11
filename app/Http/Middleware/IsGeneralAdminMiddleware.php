<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsGeneralAdminMiddleware
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
        $adminsId = [1,2,3,4,5,6,7,8,9,10];
        if(in_array(auth()->user()->adminId, $adminsId)){
            return $next($request);
        }
        return redirect()->route('guest.index');
    }
}
