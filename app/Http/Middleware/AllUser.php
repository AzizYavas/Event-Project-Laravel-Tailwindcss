<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AllUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->guard('alluser')->check()) {
            $id = auth()->guard('alluser')->id();
            $empl = DB::table('alluser')->where('id', $id);
            if (!$empl) {
                toastr()->error('Böyle Bir Kullanıcı Yok Lütfen Giriş Yapınız', 'HATA');
                return redirect()->route('login');
            } else {
                return $next($request);
            }
        } else {
            toastr()->error('Lütfen Giriş Yapınız', 'HATA');
            return redirect()->route('login');
        }
    }
}
