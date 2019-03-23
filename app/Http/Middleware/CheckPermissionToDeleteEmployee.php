<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermissionToDeleteEmployee
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
        $employee = $request->getRequestUri();
        $employee = $employee[-1];
        if(Auth::user()->id == $employee){
            return $next($request);
        }

        return redirect('employee/index');
    }
}
