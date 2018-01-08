<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware
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
        if(Auth::check()){
            $user = Auth::user();
            if($user->permission == 'LND001' || $user->permission == 'LND002' || $user->permission == 'LND001'){
                return $next($request);
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/');
        }
        
    }
}
