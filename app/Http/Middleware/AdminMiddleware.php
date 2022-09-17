<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Closure;

class AdminMiddleware
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
        if (Auth::guard('adminMiddle')->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unautorized.', 401);
            } else {
                return redirect(url('admin/login'));
            }
        }
        return $next($request);
    }
}
