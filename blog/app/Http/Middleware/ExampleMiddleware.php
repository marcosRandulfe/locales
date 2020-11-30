<?php

namespace App\Http\Middleware;

use Closure;
//use App\Models\User;

class ExampleMiddleware
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
        $api_token = $request->header('Api-Token');
        if ($api_token==env('APP_KEY')){
            return $next($request);
        }
        return null;
        
    }
}
