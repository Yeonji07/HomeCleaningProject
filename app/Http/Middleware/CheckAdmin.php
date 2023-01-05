<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckAdmin
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
        $getuser = Session::get("sessionlogin");

        if ($getuser["role"] != "admin") {
            return redirect("/")->with("alertlanding","no");
        }
        return $next($request);
    }
}
