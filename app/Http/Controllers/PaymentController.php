<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

use Cart;

session_start();

class PaymentController extends Controller
{
    public function payment(){
        return view('pages.payment');
    }

    public function placed_order(Request $request){
        $payment_data = array();
        $payment_data['payment_method'] = $request->payment_method;
        $payment_data['payment_status'] = 'Pending';
        $payment_id = DB::table('tbl_payment')
                    ->insertGetId($payment_data);


        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Pending';
        $order_id = DB::table('tbl_order')
                  ->insertGetId($order_data);


        $content = Cart::content();
        $order_details_data = array();
        foreach($content as $v_content){
            $order_details_data['order_id'] = $order_id;
            $order_details_data['product_id'] = $v_content->id;
            $order_details_data['product_name'] = $v_content->name;
            $order_details_data['product_price'] = $v_content->price;
            $order_details_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')
                ->insert($order_details_data);         
        }

        if($request->payment_method == 'cash_on_delivery'){
            Cart::destroy();
            return view('pages.cash_on_delivery');
        }elseif ($request->payment_method == 'debit_card') {
            Cart::destroy();
            return view('pages.debit_card');
        }elseif ($request->payment_method == 'bkash') {
            Cart::destroy();
            return view('pages.bkash');
        }else {
            echo "Invalid";
        }
    }
}
