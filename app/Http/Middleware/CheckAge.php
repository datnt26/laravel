<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    /*  Middleware
        -> Dùng để lọc các HTTP request trước khi chuyển đến Controller   

    */
    public function handle($request, Closure $next)
    {
        if ($request->has('age') && $request->age <= 200) {
            return redirect('home');
        }
        return $next($request);
    }
}
