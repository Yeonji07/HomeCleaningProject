<?php

namespace App\Http\Middleware;

use App\Models\Pekerja;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckLogin
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
        $getsession = Session::get("sessionlogin");
        // dd($getsession);

        if ($getsession != null) {
            if ($getsession["role"] == "admin") {
                return redirect("/admin/home");
            }
            else if($u = User::where("username",$getsession["data"]->username)->first()){
                return redirect("/user/home");
            }
            else if($p = Pekerja::where("username_pekerja",$getsession["data"]->username_pekerja)->first()){
                return redirect("/pekerja/home");
            }

            return $next($request);
        }
        else{
            return redirect("/")->with("alertlanding","no");
        }
    }
}
