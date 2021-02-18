<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
class CheckIfisUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        $url = $request->id;
        $user=User::where('id', '=', $request->id)->first();
        if(!$user){
            return redirect('/admin/home');

         }else{    
           if($user->is_admin == true)
             {  
                return redirect('/admin/home');
               
             } else {
                return $next($request);
            
            }
        } 
    }
}
