<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Eloquent
 * @property string $id
 *  @mixin \Illuminate\Database\Eloquent\Builder
 *  @mixin \Illuminate\Database\Eloquent\Builder
 */

class Payment extends Model
{
    protected $hidden = ['order_id','id','payment_details'];
    protected $appends = ['payment_info','uid'];
    public function details()
    {
        return json_decode($this->payment_details);
    }
    public static function realId($uid) {
        $id = \Hashids::connection('payment')->decode($uid);
        return $id;
    }
    public function getUidAttribute()
    {
        return \Hashids::connection('payment')->encode($this->id);
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
