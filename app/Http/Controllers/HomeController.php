<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Str;

session_start();


class HomeController extends Controller
{
    //for showing all products in home page (home_content.blade.php page)
    public function index(){
        $all_published_product = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->select('tbl_product.*', 'tbl_category.category_name', 'tbl_brand.brand_name')
                ->where('tbl_product.publication_status', 1)
                ->limit(9)
                ->get();
        $manage_published_product = view('pages.home_content')
                ->with(['all_published_product' => $all_published_product]);
        return view('layout')
                ->with('pages.home_content', $manage_published_product);
    }

    //for showing all products by category by clicking any category (product_by_category page)
    public function product_by_category($category_id){
        //     echo $category_id;

        $product_by_category = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->select('tbl_product.*', 'tbl_category.category_name', 'tbl_brand.brand_name')
                ->where('tbl_product.publication_status', 1)
                ->where('tbl_category.category_id',$category_id)
                ->limit(18)
                ->get();
        $manage_product_by_category = view('pages.product_by_category')
                ->with(['product_by_category' => $product_by_category]);
        return view('layout')
                ->with('pages.product_by_category', $manage_product_by_category);

        
    }

        //for showing all products by brand by clicking any brand (product_by_brand page)
        public function product_by_brand($brand_id){
                //     echo $category_id;

        $product_by_brand = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->select('tbl_product.*', 'tbl_category.category_name', 'tbl_brand.brand_name')
                ->where('tbl_product.publication_status', 1)
                ->where('tbl_brand.brand_id', $brand_id)
                ->limit(18)
                ->get();
        $manage_product_by_brand = view('pages.product_by_brand')
                ->with(['product_by_brand' => $product_by_brand]);
        return view('layout')
                ->with('pages.product_by_brand', $manage_product_by_brand);
        }

        //for showing all products by single product by clicking any single product (product_single_view page)
        public function product_single_view($product_id){

        $product_single_view = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->select('tbl_product.*', 'tbl_category.category_name', 'tbl_brand.brand_name')
                ->where('tbl_product.publication_status', 1)
                ->where('tbl_product.product_id', $product_id)
                ->first();
        $manage_product_single_view = view('pages.product_single_view')
                ->with(['product_single_view' => $product_single_view]);
        return view('layout')
                ->with('pages.product_single_view', $manage_product_single_view);
        }
}
