<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotaManager
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

        $response = $next($request);
//        $request->setUserResolver(function(){
//           return \Auth::user();
//        });
        if(! $request->user()->isManager()){
            return redirect()->route('articles.index');
        }

        return $response;
    }
}
