<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function adminloginfunc(Request $request)
    {

        $cretendial = $request->validate(
            [
                'email' => 'required',
                'password' => 'required|max:6',
            ],
            [
                'password.required' => 'Şifreniz Boş Kalamaz',
                'email.required' => 'Mailiniz Boş Kalamaz',
            ]
        );

        if (auth()->guard('adminuser')->attempt($cretendial)) {

            auth()->guard('adminuser')->user();

            $request->session()->regenerate();

            toastr()->success('Hoşgeldin : ' . auth()->guard('adminuser')->user()->name, 'Giriş İşlemi Başarılı');

            return redirect()->intended('admin/dashboard')->with('adminuser', ['email' => $request->input('email'), 'password' => $request->input(Hash::make('password'))]);
        }

        toastr()->error('Giriş Başarısız', 'HATA');

        return redirect()->back();
    }

    public function adminlogoutpost()
    {
        auth()->guard('adminuser')->logout();
        request()->session()->flush();
        request()->session()->regenerate();

        toastr()->error('ÇIKIŞ YAPILDI', 'ÇIKIŞ');

        return redirect()->route('adminlogin');
    }
}
