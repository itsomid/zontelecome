<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function getSetting()
    {

        return $setting =  \DB::table('setting')->first();

    }
}
