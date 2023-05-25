<?php

namespace App\Http\Middleware\admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->guard('adminuser')->check()) {
            $id = auth()->guard('adminuser')->id();
            $empl = DB::table('adminuser')->where('id', $id);
            if (!$empl) {
                toastr()->error('Böyle Bir Kullanıcı Yok Lütfen Giriş Yapınız', 'HATA');
                return redirect()->route('adminlogin');
            } else {
                return $next($request);
            }
        } else {
            toastr()->error('Lütfen Giriş Yapınız', 'HATA');
            return redirect()->route('adminlogin');
        }
    }
}
