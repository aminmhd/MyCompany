<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PanelMiddleware
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
        $auth_check_user = Auth::check();
        if ($auth_check_user){
            return $next($request);
        } else {
            return redirect()->Route('app.home.login')->with(['error' => 'Sorry, you are not Admin or login ']);
        }


    }
}
