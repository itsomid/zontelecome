<?php

namespace App\Http\Controllers\Panel;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::whereType('physical')->get();
        return view('panel.product',['products'=>$products]);
    }

    public function getProduct($slug,Request $request)
    {
        $product = Product::whereSlug($slug)->first();
        $related_products = Product::whereRelatedProduct($product->id)->get();
        $last_id = Product::all()->last()->id;

        return view('panel.product_edit',['product'=>$product , 'related_products'=>$related_products,'last_id'=>$last_id]);
    }

    public function editPackage(Request $request,$id)
    {
        $related_products = Product::whereRelatedProduct($id)->get();
        $title = $request->get( 'rp_title');

//        $request->all();
        foreach ($title as $key=>$t)
        {

            if(!Product::whereId($key)->first())
            {
                $new_package = new Product;
                $new_package->title = $request->rp_title[$key];
                $new_package->price = $request->rp_price[$key];
                $new_package->related_product = $id;
                $new_package->type = 'virtual';
                if (isset($request->rp_status[$key])) {
                    $new_package->status = '1';
                } else {
                    $new_package->status = '0';
                }
                $new_package->save();
            }
            else{
                $package = Product::whereId($key)->first();
                $package->title = $request->rp_title[$key];
                $package->price = $request->rp_price[$key];
                if (isset($request->rp_status[$key])) {
                    $package->status = '1';
                } else {
                    $package->status = '0';
                }
                $package->save();
            }
        }

        foreach ($related_products as $rp)
        {
            if (!isset($request->rp_title[$rp->id]) && !isset($request->rp_price[$rp->id]))
            {
                Product::whereId($rp->id)->delete();
            }
        }
        return \Redirect::back();
    }

    public function editProduct(Request $request,$slug)
    {

        $product = Product::whereSlug($slug)->first();
        $product->title = $request->p_title;
        $product->slug = $request->p_slug;
        $product->price = $request->p_price;
        $product->description = $request->p_description;
        if(isset($request->p_status)) {
            $product->status = '1';
        }
        else
        {
            $product->status = '0';
        }
        $product->save();
        return \Redirect::back();


    }
    public function getproductInfo(Request $request)
    {
       $product = Product::whereSlug($request->name)->first();
        return $product->price;
    }
}
