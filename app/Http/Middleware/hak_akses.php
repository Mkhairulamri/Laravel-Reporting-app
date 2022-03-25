<?php

namespace App\Http\Middleware;
namespace Illuminate\Auth\Middleware;
use Closure;

class hak_akses
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
        if(in_array($request->User()->akses)){
            return $next($request);
        }
        return redirect('/');
        
    }
}
