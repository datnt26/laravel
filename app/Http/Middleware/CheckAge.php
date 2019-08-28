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

    /*  Middleware Parameters 
        -> Cách dùng Route::resource('comments', 'CommentController')->middleware('check.age:200');

        public function handle($request, Closure $next, $limit)
        {
            if ($request->has('age') && $request->age <= $limit) {
                return redirect('home');
            }
            return $next($request);
        }
    */

    // Dùng sau khi HTTP response đã được gửi xong cho trình duyệt
    public function terminate($request, $response)
    {
        // Store the session data...
    }
}
