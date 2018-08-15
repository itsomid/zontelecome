<?php

namespace App\Http\Controllers\Panel;

use App\Order;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {


         $all_order = Order::all()->count();
         $income = Order::all()->sum('total_price');
            $monthly_order = \DB::table('orders')->get(['id', 'created_at'])->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('m');
         });

         $monthly_income= \DB::table('orders')
            ->select(\DB::raw('SUM(total_price) as total_expense'))
            ->groupBy(\DB::raw('YEAR(created_at) DESC, MONTH(created_at) DESC'))->get();

        $current_year = Carbon::now()->format('y');
         $annual_income = \DB::table('orders')
            ->select(\DB::raw('SUM(total_price) as total'))
            ->groupBy(\DB::raw('YEAR('.$current_year.')'))->get();


        return view('panel.dashboard',['all_order'=>$all_order,'income'=>$income,'annual_income'=>$annual_income,'monthly_order'=>$monthly_order]);
    }
}
