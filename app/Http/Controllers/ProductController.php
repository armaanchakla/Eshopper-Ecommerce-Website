<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Str;

session_start();

class ProductController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        return view('admin.add_product');
    }

    public function save_product(Request $request){
        $this->AdminAuthCheck();
        $data = array();
        $data['product_id'] = $request->product_id;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;

        $data['product_name'] = $request->product_name;
        $data['product_short_description'] = $request->product_short_description;
        $data['product_long_description'] = $request->product_long_description;

        $data['product_price'] = $request->product_price;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['publication_status'] = $request->publication_status;

        $image=$request->file('product_image');
        if ($image) {
            $image_name = Str::random(20);
            $ext =  strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if ($success) {
                $data['product_image'] = $image_url;
                DB::table('tbl_product')->insert($data);
                Session::put('product_with_image','Product Added Successfully!');
                return Redirect::to('add-product');

            }
        }

        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('product_without_image', 'Product added successfully without image!');
        return Redirect::to('add-product');
    }

    public function all_product(){
        $this->AdminAuthCheck();
        $all_product_info = DB::table('tbl_product')
                        ->join('tbl_category','tbl_product.category_id','=', 'tbl_category.category_id')
                        ->join('tbl_brand','tbl_product.brand_id','=', 'tbl_brand.brand_id')
                        ->select('tbl_product.*','tbl_category.category_name','tbl_brand.brand_name')
                        ->get();

                        // echo "<pre>";
                        // print_r($all_product_info);
                        // echo "</pre>";
                        // exit();

        $manage_product = view('admin.all_product')
                        ->with(['all_product_info' => $all_product_info]);
        return view('admin_layout')
                        ->with('admin.all_product',$manage_product);
    	return view('admin.all_category');
    }

    public function inactive_product($product_id){
        $this->AdminAuthCheck();
        //echo $category_id;

        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->update(['publication_status' => 0]);
        Session::put('message_product_inactive', 'Product Inactivated!');
        return Redirect::to('/all-product');
    }

    public function active_product($product_id){
        $this->AdminAuthCheck();
        //echo $category_id;

        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->update(['publication_status' => 1]);
        Session::put('message_product_active', 'Product Activated!');
        return Redirect::to('/all-product');
    }

    public function delete_product($product_id){
        $this->AdminAuthCheck();
        //echo $category_id;

        DB::table('tbl_product')
        ->where('product_id', $product_id)
            ->delete();
        Session::put('message_product_delete', 'Product Deleted Succesfully!');
        return Redirect::to('/all-product');
    }

    public function edit_product($product_id){
        $this->AdminAuthCheck();
        //echo $category_id;

        $product_info = DB::table('tbl_product')
            ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')
            ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
            ->select('tbl_product.*', 'tbl_category.category_name', 'tbl_brand.brand_name')
            ->where('product_id', $product_id)
            ->first();

        $product_show = view('admin.edit_product')
            ->with(['product_info' => $product_info]);
        return view('admin_layout')
            ->with('admin.all_product', $product_show);

        // return view('admin.edit_category');
    }

    public function update_product(Request $request, $product_id){
        $this->AdminAuthCheck();
        // echo $category_id;

        $data = array();
        $data['product_name'] = $request->product_name;
        // $data['category_name'] = $request->category_name;
        // $data['brand_name'] = $request->brand_name;
        $data['product_short_description'] = $request->product_short_description;
        $data['product_long_description'] = $request->product_long_description;
        $data['product_price'] = $request->product_price;
        //$data['product_image'] = $request->product_image;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;

        $image = $request->file('product_image');
        if ($image) {
            $image_name = Str::random(20);
            $ext =  strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['product_image'] = $image_url;
                DB::table('tbl_product')
                    ->where('product_id', $product_id)
                    ->update($data);
                Session::put('product_with_image', 'Product Updated Successfully!');
                return Redirect::to('/all-product');
            }
        }

        $data['product_image'] = '';
        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->update($data);
        Session::put('product_without_image', 'Product updated successfully without image!');
        return Redirect::to('/all-product');
    }

    public function AdminAuthCheck()
    { //check tutorial part 23 to secure product, category, brand. But learning Constructor is much easier.
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return;
        } else {
            return Redirect::to('/admin-login')->send();
        }
    }








}
