<?php

namespace App\Http\Middleware\apis;

use Closure;

class Apikey
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
        if($request->apikey!== 'JHG6KLJ4EDVFH0awrioh78vnm'){
            return response()->json(['message'=>'the apikey is not correct']);
        }
        return $next($request);
    }
}
