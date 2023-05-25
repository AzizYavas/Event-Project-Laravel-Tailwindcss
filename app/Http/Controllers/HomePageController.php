<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomePageController extends Controller
{
    public function index()
    {

        /* --- SLİDER İŞLEMLERİ --- */

        $eventSliderData = DB::table('etkinkler')->orderBy('event_start', 'desc')
            ->limit(4)
            ->get();

        /* --- SLİDER İŞLEMLERİ --- */

        /* --- BU HAFTAKİ ETKİNKLER --- */

        $startDate = now()->subDays(6); // Son 7 günün başlangıç tarihi (bugünden 6 gün önce)
        $endDate = now();

        $weeklyEvent = DB::table('etkinkler')
            ->whereBetween('event_start', [$startDate, $endDate])
            ->limit(5)
            ->get();

        /* --- BU HAFTAKİ ETKİNKLER --- */

        /* --- POPÜLER ETKİNKLER --- */

        $mostRepeatedEvents = DB::table('etkinkler')
            ->join('eventanduser', 'etkinkler.id', '=', 'eventanduser.event_id')
            ->select('etkinkler.*', DB::raw('COUNT(eventanduser.event_id) as count'))
            ->groupBy('etkinkler.id')
            ->orderByRaw('COUNT(eventanduser.event_id) DESC')
            ->where('eventanduser.agree_data', 1)
            ->limit(5)
            ->get();

        // dd($mostRepeatedEvents);


        /* --- POPÜLER ETKİNKLER --- */

        /* --- NAVBAR IMAGE --- */

        $takeImageNavbar = DB::table('alluser')->where('id', auth()->guard('alluser')->id())->first();

        /* --- NAVBAR IMAGE --- */

        if($takeImageNavbar == null){

            return view('homepage', compact('eventSliderData', 'weeklyEvent', 'mostRepeatedEvents'));

        }else{

            return view('homepage', compact('eventSliderData', 'weeklyEvent', 'mostRepeatedEvents'))->with('image', $takeImageNavbar->profile_image);

        }
    }

    // LOGİN VE LOGOUT İŞLEMLERİ

    public function login()
    {
        return view('login');
    }

    public function loginpost(Request $request)
    {
        $cretendial = $request->validate(
            [
                'email' => 'required',
                'password' => 'required|max:6',
            ],
            [
                'password.required' => 'Şifreniz Adresiniz Yalnış',
                'password.required' => 'Şifreniz Yalnış Yalnış',
                'password.max' => 'Şifreniz En fazla 6 karakter olabilir',
            ]
        );

        if (auth()->guard('alluser')->attempt($cretendial)) {

            auth()->guard('alluser')->user();

            $request->session()->regenerate();

            toastr()->success('Hoşgeldin : ' . auth()->guard('alluser')->user()->name, 'Giriş İşlemi');

            return redirect()->intended('/')->with('alluser', ['email' => $request->input('email'), 'password' => $request->input(Hash::make('password'))]);
        }

        toastr()->error('Giriş Başarısız', 'HATA');

        return redirect()->back();
    }

    public function logoutpost()
    {

        auth()->guard('alluser')->logout();
        request()->session()->flush();
        request()->session()->regenerate();

        toastr()->error('ÇIKIŞ YAPILDI', 'ÇIKIŞ');

        return redirect()->route('homepage');
    }

    // LOGİN VE LOGOUT İŞLEMLERİ


    // KAYIT İŞLEMLERİ

    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'loginName' => 'required|string',
                'loginSurname' => 'required|string',
                'loginEmail' => 'required|email|unique:alluser,email',
                'loginPassword' => 'required|max:6'
            ],
            ['loginEmail.unique' => 'Bu Mail Adresi Daha Önce Alındı']
        );

        if ($validator->fails()) {
            toastr()->error($validator->errors()->first(), 'HATA');
            return redirect()->back();
        }

        DB::table('alluser')->insert([
            'name' => $request->loginName,
            'surname' => $request->loginSurname,
            'email' => $request->loginEmail,
            'password' => Hash::make($request->loginPassword),
        ]);

        toastr()->success('Kayıt Başarılı', 'KAYIT');

        return redirect()->route('homepage');
    }


    // KAYIT İŞLEMLERİ


}
