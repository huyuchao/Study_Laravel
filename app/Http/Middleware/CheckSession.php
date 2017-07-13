<?php

namespace App\Http\Middleware;

use Closure;

/**
 * 检测session
 * Class CheckSession
 * @package App\Http\Middleware
 */
class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
