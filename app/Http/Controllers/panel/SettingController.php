<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $setting =  \DB::table('setting')->first();
        return view('panel.setting',['setting'=>$setting]);
    }
    public function edit(Request $request)
    {

       \DB::table('setting')->update(['tax_fee'=>$request->tax_fee],['delivery_fee'=>$request->delivery_fee]);

        return \Redirect::back();
    }
}
