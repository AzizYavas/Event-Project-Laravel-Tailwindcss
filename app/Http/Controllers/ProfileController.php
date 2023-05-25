<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function userprofilefunc()
    {
        $takeImage = DB::table('alluser')->where('id', auth()->guard('alluser')->id())->get();

        /* --- NAVBAR IMAGE --- */

        $takeImageNavbar = DB::table('alluser')->where('id', auth()->guard('alluser')->id())->first();

        /* --- NAVBAR IMAGE --- */
        

        return view('userprofile', compact('takeImage'))->with('image', $takeImageNavbar->profile_image);
    }

    public function profileupdatefunc(Request $request)
    {

        if ($request->profileimage) {

            $image = "data:image/jpeg;base64," . base64_encode(file_get_contents($request->file('profileimage')->path()));

            DB::table('alluser')
                ->where('id', auth()->guard('alluser')->id())
                ->update([
                    'profile_image' => $image
                ]);

            toastr()->success('Başarıyla Güncellendi', 'Güncelleme');
            return redirect()->route('homepage');
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    'passwordcahnge' => 'required|max:6',
                    'passwordcahngetwo' => 'required|max:6',
                ],
                [
                    'passwordcahnge.required' => 'Boş Kalamaz',
                    'passwordcahnge.max' => 'En az 6 karakter olmak zorunda',
                    'passwordcahngetwo.required' => 'Boş Kalamaz',
                    'passwordcahngetwo.max' => 'En az 6 karakter olmak zorunda'
                ]
            );

            if ($validator->fails()) {
                toastr()->error($validator->errors()->first(), 'HATA');
                return redirect()->back();
            }

            if ($request->passwordcahnge != $request->passwordcahngetwo) {
                return redirect()->back();
                toastr()->error('Lütfen Şifrenizi Doğrulayınız', 'HATA');
            } else {
                DB::table('alluser')
                    ->where('id', auth()->guard('alluser')->id())
                    ->update([
                        'password' => Hash::make($request->passwordcahnge)
                    ]);

                toastr()->success('Başarıyla Güncellendi', 'Güncelleme');
                return redirect()->route('homepage');
            }
        }
    }
}
