<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function handle(Request $request, Closure $next)
     {
         if(session()->has('email') && session()->has('userid'))
         {
            if($request->path()!='userhome' && $request->path()!='userdeposit' && $request->path()!='userwithdraw' && $request->path()!='usertransfer' && $request->path()!='userstatement')
                {
                    return back();
                }                         
         }
         else
         {
             if($request->path()!='/' && $request->path()!='loginpage')
             {
                 return redirect('/loginpage')->with ('fail','You must be logged in');
             }
         }
 
         return $next($request)->header('cache-control','no-cache,no-store,max-age=0,must-revalidate')
         ->header('pragma','no-cache')
         ->header('Expires','sat 01 Jan 1990 00:00:00 GMT');
     }
}
