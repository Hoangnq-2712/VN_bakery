<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Checklevel
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
        if(Auth::check()) // kieerm tra dang nhap chua
        {
            $user=Auth::user();
                if($user->level==1)
                {
                   // level bang   1 thi cho thoả mãn nhưng điều kiện của route tiếp thoe
                    return $next($request);
                }
                else
                {
                 // không thoả mãn thì về trang chủ
                 return redirect()->route('getHome');
                }
         }
         else{
            // chưa đăng nhập thì vào trang đăng nhập
            return route('login');
        }
}
}
