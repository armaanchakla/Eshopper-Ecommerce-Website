<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

use Cart;

session_start();

class CartController extends Controller
{
    public function add_to_cart(Request $request){

        $cart_quantity = $request->cart_quantity;
        $product_id = $request->product_id;

        $product_info = DB::table('tbl_product')
                      ->where('product_id',$product_id)
                      ->first();

        //   echo "<pre>";
        //     print_r($product_info);
        //   echo "</pre>";

        $data['qty'] = $cart_quantity;
        $data['id'] = $product_info->product_id;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;

        Cart::add($data);
        return Redirect::to('/show-cart');
    }

    public function show_cart(){
        $all_published_category = DB::table('tbl_category')
                           ->where('publication_status', 1)
                           ->get();
        $manage_all_published_category = view('pages.add_to_cart')
            ->with(['all_published_category' => $all_published_category]);
        return view('layout')
            ->with('pages.add_to_cart', $manage_all_published_category);
    }

    public function delete_to_cart($rowId){
        // echo $rowId;

        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }

    public function update_to_cart(Request $request){
        $qty = $request->cart_quantity;
        $rowId = $request->rowId;

        // echo "$qty";
        // echo "<br>";
        // echo "$rowId";

        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
}
