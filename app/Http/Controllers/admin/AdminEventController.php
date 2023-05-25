<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdminEventController extends Controller
{
    public function eventAction()
    {
        return view('admin.eventadd');
    }

    public function eventadd(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'eventCategory' => 'required|string',
                'eventTitle' => 'required|string',
                'eventStart' => 'required|string',
                'eventEnd' => 'required|string',
                'eventAdress' => 'required|string',
                'eventDescription' => 'required|string',
                'eventImage' => 'required'
            ]
        );

        if ($validator->fails()) {
            toastr()->error($validator->errors()->first(), 'HATA');
            return redirect()->back();
        }

        $image = "data:image/jpeg;base64," . base64_encode(file_get_contents($request->file('eventImage')->path()));

        DB::table('etkinkler')->insert([
            'event_category' => $request->eventCategory,
            'event_title' => $request->eventTitle,
            'event_adress' => $request->eventAdress,
            'event_start' => $request->eventStart,
            'event_end' => $request->eventEnd,
            'event_text' => $request->eventDescription,
            'event_imageBase64' => $image
        ]);

        toastr()->success('Etkinlik Başarıyla Eklendi', 'Etkinlik');

        return redirect()->route('adminhomepage');
    }

    public function eventupdate(Request $request)
    {
        $eventUpdateData = DB::table('etkinkler')->where('id', $request->id)->first();

        return view('admin.eventupdate', compact('eventUpdateData'));
    }

    public function eventupdatepost(Request $request)
    {

        $validator = Validator::make(
            $request->only('eventCategory', 'eventTitle', 'eventStart', 'eventEnd', 'eventAdress', 'eventDescription'),
            [
                'eventCategory' => 'required|string',
                'eventTitle' => 'required|string',
                'eventStart' => 'required|string',
                'eventEnd' => 'required|string',
                'eventAdress' => 'required|string',
                'eventDescription' => 'required|string'
            ]
        );

        if ($validator->fails()) {
            toastr()->error($validator->errors()->first(), 'HATA');
            return redirect()->back();
        }

        if ($request->file('eventImage') == null) {

            DB::table('etkinkler')
                ->where('id', $request->dataId)
                ->update([
                    'event_category' => $request->eventCategory,
                    'event_title' => $request->eventTitle,
                    'event_adress' => $request->eventAdress,
                    'event_start' => $request->eventStart,
                    'event_end' => $request->eventEnd,
                    'event_text' => $request->eventDescription
                ]);

            toastr()->success('Etkinlik Başarıyla Güncellendi', 'Etkinlik');

            return redirect()->route('adminhomepage');
        } else {

            $image = "data:image/jpeg;base64," . base64_encode(file_get_contents($request->file('eventImage')->path()));

            DB::table('etkinkler')
                ->where('id', $request->dataId)
                ->update([
                    'event_category' => $request->eventCategory,
                    'event_title' => $request->eventTitle,
                    'event_adress' => $request->eventAdress,
                    'event_start' => $request->eventStart,
                    'event_end' => $request->eventEnd,
                    'event_text' => $request->eventDescription,
                    'event_imageBase64' => $image
                ]);

            toastr()->success('Etkinlik Başarıyla Güncellendi', 'Etkinlik');

            return redirect()->route('adminhomepage');
        }
    }

    public function eventdelete(Request $request)
    {

        DB::table('etkinkler')
            ->where('id', $request->get('id'))
            ->delete();

        toastr()->success('Etkinlik Başarıyla Silindi', 'Etkinlik');

        return redirect()->route('adminhomepage');
    }
}
