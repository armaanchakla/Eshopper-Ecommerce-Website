<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class CustomerController extends Controller
{
    public function customer_registration(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['mobile_number'] = $request->mobile_number;

        $customer_id = DB::table('tbl_customer')
            ->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return Redirect::to('/');
    }

    public function customer_logout()
    {
        Session::flush();
        return Redirect('/');
    }

    public function customer_login(Request $request)
    {
        $customer_email = $request->customer_email;
        $customer_password = md5($request->customer_password);
        $result = DB::table('tbl_customer')
        ->where('customer_email', $customer_email)
            ->where('customer_password', $customer_password)
            ->first();

        if ($result) {
            Session::put('customer_name', $result->customer_name);
            Session::put('customer_id', $result->customer_id);
            return Redirect::to('/');
        } else {
            Session::put('message', 'Email or Password Invalid.');
            return Redirect::to('/login-check');
        }
    }

    public function customer_account(){
        return view('pages.customer_account');
    }
}
