<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermissionToDeleteCompany
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
        $company = $request->getRequestUri();
        $company = $company[-1];
        if(Auth::user()->id == $company){
            return $next($request);
        }

        return redirect('company/index');
    }
}
