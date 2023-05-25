<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        $allEvent = DB::table('etkinkler')->get();

        $eventCount = DB::table('etkinkler')->count();

        return view('admin.homepage',compact('allEvent','eventCount'));
    }

}
