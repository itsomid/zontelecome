<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * @mixin \Eloquent
 * @property string $device_id
 *  * @property string $id
 *  @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $order
 *  @mixin \Illuminate\Database\Eloquent\Builder
 *  @mixin \Illuminate\Database\Eloquent\Builder
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereOrderId($value)
 */

class Cart extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function insideOrder()
    {
        return $this->belongsTo('App\Order', 'order_id')->select(['id','total_price','created_at','status']);
    }
    public function insideProduct()
    {
        return $this->belongsTo('App\Product', 'product_id')->select(['id','title','price','description']);
    }

}
