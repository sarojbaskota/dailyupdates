<?php

namespace App\Http\Middleware;

use Closure;

class EmployeeMiddleware
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
        if(auth()->user()->is_admin == 0){
            return $next($request);
            }
            return \Redirect::back();
    }
}
// if(Auth::user()->status == 1){
//     if(Auth::user()->is_admin == 1) {
//     redirect()->route('admin/dashboard');
//      }
//     elseif(Auth::user()->is_admin == 0){
//      return redirect()->route('employee.dashboard') ;
//     }
// }else{
//     return \Redirect::back()->with('msg', 'The Message');        }