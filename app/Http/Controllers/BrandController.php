<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class BrandController extends Controller
{
    public function index(){
        return view('admin.add_brand');
    }

    public function save_brand(Request $request)
    {
        $this->AdminAuthCheck();
        $data = array();
        $data['brand_id'] = $request->brand_id;
        $data['brand_name'] = $request->brand_name;
        $data['brand_description'] = $request->brand_description;
        $data['publication_status'] = $request->publication_status;

        // echo "<pre>";
        // 	print_r($data);
        // echo "</pre";

        DB::table('tbl_brand')
        ->insert($data);
        Session::put('message', 'Brand Added Succesfully!');
        return Redirect::to('/add-brand');
    }

    public function all_brand()
    {
        $this->AdminAuthCheck();
        $all_brand_info = DB::table('tbl_brand')
                        ->get();

        $manage_brand = view('admin.all_brand')
                      ->with(['all_brand_info' => $all_brand_info]);
        return view('admin_layout')
                      ->with('admin.all_brand', $manage_brand);

        // return view('admin.all_brand');
    }

    public function inactive_brand($brand_id)
    {
        $this->AdminAuthCheck();
        //echo $brand_id;

        DB::table('tbl_brand')
        ->where('brand_id', $brand_id)
            ->update(['publication_status' => 0]);
        Session::put('message_brand_inactive', 'Brand Inactivated!');
        return Redirect::to('/all-brand');
    }

    public function active_brand($brand_id)
    {
        $this->AdminAuthCheck();
        //echo $brand_id;

        DB::table('tbl_brand')
        ->where('brand_id', $brand_id)
            ->update(['publication_status' => 1]);
        Session::put('message_brand_active', 'Brand Activated!');
        return Redirect::to('/all-brand');
    }

    public function edit_brand($brand_id)
    {
        $this->AdminAuthCheck();
        //echo $brand_id;

        $brand_info = DB::table('tbl_brand')
        ->where('brand_id', $brand_id)
            ->first();

        $brand_show = view('admin.edit_brand')
        ->with(['brand_info' => $brand_info]);
        return view('admin_layout')
        ->with('admin.all_brand', $brand_show);

        // return view('admin.edit_brand');
    }

    public function update_brand(Request $request, $brand_id)
    {
        $this->AdminAuthCheck();
        // echo $brand_id;

        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_description'] = $request->brand_description;

        DB::table('tbl_brand')
        ->where('brand_id', $brand_id)
            ->update($data);
        Session::put('message_brand_update', 'Brand Updated Succesfully!');
        return Redirect::to('/all-brand');
    }

    public function delete_brand($brand_id)
    {
        $this->AdminAuthCheck();
        //echo $brand_id;

        DB::table('tbl_brand')
        ->where('brand_id', $brand_id)
            ->delete();
        Session::put('message_brand_delete', 'Brand Deleted Succesfully!');
        return Redirect::to('/all-brand');
    }

    public function AdminAuthCheck()
    { //check tutorial part 23 to secure slider, product, category, brand. But learning Constructor is much easier.
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return;
        } else {
            return Redirect::to('/admin-login')->send();
        }
    }
}
