<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = User::find(Auth::id());
        if($user->role === $role)
        {
            return $next($request);
        }
        else {
            return abort(403, 'Forbidden Access !');
        }
    }
}
