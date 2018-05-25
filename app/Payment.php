<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $hidden = ['order_id','id','payment_details'];
    protected $appends = ['payment_info'];
    public function details()
    {
        return json_decode($this->payment_details);
    }
    public function setDetails($details)
    {
        $this->payment_details = json_encode($details);
        $this->save();
    }
    public function getPaymentInfoAttribute() {
        return $this->details();
    }
    public function order()
    {
        return $this->belongsTo('App\Payment');
    }
//    public function product()
//    {
//         return Order::where('id',$this->order_id)->with('cart')->get();
////        return $this->belongsToMany('App\Product','carts')->where('order_id',$this->order_id);
//    }


    public function setPaid()
    {
        $this->status = 'successful';
        $this->save();

    }
}
