<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSekretaris
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
        $admin = $request->user();
        if ($admin)
            if ($admin->hasRole('sekretaris'))
                return $next($request);

        abort(404);
    }
}
