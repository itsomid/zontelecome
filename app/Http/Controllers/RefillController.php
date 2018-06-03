<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RefillController extends Controller
{
    public function index()
    {
        return view('refill');
    }
}
