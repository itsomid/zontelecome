<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

/**
 * App\Product
 *
 * @property string $id
 * @property string $slug
 * @property string $type
 * @property string $related_product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereRelatedProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    protected $fillable = [ 'title', 'slug', 'type','price','status','description' ];
    protected $hidden = ['id'];
    public function cart()
    {
        return $this->hasMany('App\Cart')->with('order');
    }

}
