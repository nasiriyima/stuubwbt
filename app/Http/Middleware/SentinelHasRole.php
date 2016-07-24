<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class SentinelHasRole
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
        $actions = $request->route()->getAction();

    if (array_key_exists("inRole", $actions)) 
    {
      $roles = $actions['inRole'];
      
      $user = Sentinel::getUser();
      foreach ($roles as $r){
          
      }
        
      
      

//      try
//      {
//        $user = Sentry::getUser();
//
//        if ( ! $user->isSuperUser())
//        {
//          $count = 0;
//
//          foreach ($groups as $g)
//          {
//            $group = Sentry::findGroupByName($g);
//           
//            if ($user->inGroup($group))
//            {
//              $count++;
//            }	
//          }
//          
//          if ($count === 0)
//          {
//            return redirect()->route('dashboard.index')->with('merror', trans('acl.cannon_reach_this_resource_with_your_role'));
//          }
//        }		
//        
//      }
//      catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
//      {
//        return redirect()->route('auth.login')->with('merror', trans('acl.user_not_found'));
//      }
//       
//      catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
//      {
//        return redirect()->route('auth.login')->with('merror', trans('acl.group_not_found'));
//      }		
    }		


        return $next($request);
    }
}
