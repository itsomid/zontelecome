<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
/**
 * @mixin \Eloquent
 * @property string $id
 *  @property-read \Illuminate\Database\Eloquent\Collection|\App\Cart[] $cart
 *  @mixin \Illuminate\Database\Eloquent\Builder
 *  @mixin \Illuminate\Database\Eloquent\Builder
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUid($value)
 */
class Order extends Model
{
    protected $hidden = ['id','tax'];
    protected $appends = ['uid','total_quantity','tax_price','final_price'];

    public static function realId($uid) {
        $id = \Hashids::connection('main')->decode($uid);
        return $id;
    }
    /**
     * @return $uid
     */
    public function getUidAttribute()
    {
        return \Hashids::connection('main')->encode($this->id);
    }

    /**
     * @param $uid
     * @return null or get_called_class()
     */
    public static function findByUID($uid)
    {
        //return get_called_class();
        $id = Order::realId($uid);
        if(is_null($id))
            return null;
        else
            return Order::find($id);
    }

    public function cart()
    {
        return $this->hasMany('App\Cart')->with('product');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product','carts')->withPivot('quantity','description');

    }
    public function virtualProduct()
    {
        return $this->belongsToMany('App\Product','carts')->where('related_product','!=','0');

    }
    public function orderlog()
    {
        return $this->hasMany('App\Orderlog');
    }
    public function getTotalQuantityAttribute()
    {
        return Cart::where('order_id',$this->id)->sum('quantity');
    }
    
    public function payment()
    {
        return $this->hasOne('App\Payment')->where('status','successful');
    }
    public function allPayments()
    {
        return $this->hasMany('App\Payment');
    }

    public function getFinalPriceAttribute()
    {
        return (float)number_format($this->total_price + $this->delivery_fee - $this->discount,'2');
    }

    public function getTaxPriceAttribute()
    {
        return $this->tax;
    }
}
