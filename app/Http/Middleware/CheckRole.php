<?php
/**
 * Created by PhpStorm.
 * User: Asad Mahmood
 * Date: 11/4/2016
 * Time: 10:44 PM
 */
namespace App\Http\Middleware;

// First copy this file into your middleware directoy
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // Get the required roles from the route
        $roles = $this->getRequiredRoleForRoute($request->route());
        // Check if a role is required for the route, and
        // if so, ensure that the user has that role.
        if($roles == 'C.A')
        {

            if(Auth::Check())
            {
                if ($request->user()->role->name == 'Customer') {
                    return $next($request);
                }
            }
            else
                return $next($request);
        }
        if ($roles != 'Combine') {
            if ($request->user()->role->name == $roles) {
                return $next($request);
            }

        }
        else{
            if ($request->user()->role->name == 'Admin' || $request->user()->role->name == 'Manager') {
                return $next($request);
            }

        }
        return redirect()->route('login');
    }

    private function getRequiredRoleForRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['roles']) ? $actions['roles'] : null;
    }
}