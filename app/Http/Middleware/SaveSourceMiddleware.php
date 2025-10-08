<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SaveSourceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('from')) {
            session(['from_source' => $request->get('from')]);
        }

        return $next($request);
    }
}
