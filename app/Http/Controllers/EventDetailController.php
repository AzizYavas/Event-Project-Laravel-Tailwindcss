<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EventDetailController extends Controller
{
    public function index(Request $request)
    {

        /* ----- Etkinlik Detay ----- */

        $eventDetailForId = DB::table('etkinkler')->where('id', $request->route('id'))->get();

        /* ----- Etkinlik Detay ----- */

        /* ----- Etkinlik Bildirimi ----- */

        $eventNotification = DB::table('eventanduser')
            ->where('event_id', $request->route('id'))
            ->where('user_id', auth()->guard('alluser')->id())
            ->get();

        $emtpyValue = null;

        foreach ($eventNotification as $checkEventForIdAndLink) :
            if ($checkEventForIdAndLink->user_id == auth()->guard('alluser')->id() and $checkEventForIdAndLink->event_id == $request->route('id')) {
                $emtpyValue = true;
            } else {
                $emtpyValue = false;
            }
        endforeach;

        /* ----- Etkinlik Bildirimi ----- */

        /* --- NAVBAR IMAGE --- */

        $takeImageNavbar = DB::table('alluser')->where('id', auth()->guard('alluser')->id())->first();

        /* --- NAVBAR IMAGE --- */

        if($takeImageNavbar == null){

            return view('eventdetail', compact('eventDetailForId', 'eventNotification', 'emtpyValue'));

        }else{

            return view('eventdetail', compact('eventDetailForId', 'eventNotification', 'emtpyValue'))->with('image', $takeImageNavbar->profile_image);

        }

    }


    public function eventPostResponse(Request $request)
    {

        if (auth()->guard('alluser')->check() === true) {

            if ($request->eventidagree) {

                DB::table('eventanduser')->insert([
                    'user_id' => auth()->guard('alluser')->id(),
                    'event_id' => $request->eventidagree,
                    'agree_data' => 1
                ]);

                toastr()->success('Bildirimiz için Teşekkürler', 'Başarılı');
                return redirect()->back();
            } else {

                DB::table('eventanduser')->insert([
                    'user_id' => auth()->guard('alluser')->id(),
                    'event_id' => $request->eventidnotagree,
                    'agree_data' => 0
                ]);

                toastr()->success('Bildirimiz için Teşekkürler', 'Başarılı');
                return redirect()->back();
            }
        } else {

            toastr()->error('Lütfen Giriş Yapınız yada Kayıt Olunuz', 'Hata');
            return redirect()->route('login');
        }
    }

    public function eventupdateresponse(Request $request)
    {

        if ($request->eventidagreeforcheck) {

            DB::table('eventanduser')
                ->where('user_id', auth()->guard('alluser')->id())
                ->where('event_id', $request->eventidagreeforcheck)
                ->update([
                    'agree_data' => 0 
                ]);

                toastr()->success('Bildirimiz için Teşekkürler', 'Başarılı');
                return redirect()->back();

        } else {

            DB::table('eventanduser')
                ->where('user_id', auth()->guard('alluser')->id())
                ->where('event_id', $request->eventidnotagreeforcheck)
                ->update([
                    'agree_data' => 1 
                ]);

                toastr()->success('Bildirimiz için Teşekkürler', 'Başarılı');
                return redirect()->back();
        }


    }
}
