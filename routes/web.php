<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layout');
// });


//Frontend Routes....................................................................
Route::get('/','App\Http\Controllers\HomeController@index');


//Show Product Category..............................................................
Route::get('/product-by-category/{category_id}','App\Http\Controllers\HomeController@product_by_category');
Route::get('/product-by-brand/{brand_id}','App\Http\Controllers\HomeController@product_by_brand');
Route::get('/product-single-view/{product_id}','App\Http\Controllers\HomeController@product_single_view');


//Cart Routes..............................................................
Route::post('/add-to-cart','App\Http\Controllers\CartController@add_to_cart');
Route::get('/show-cart', 'App\Http\Controllers\CartController@show_cart');
Route::get('/delete-to-cart/{rowId}', 'App\Http\Controllers\CartController@delete_to_cart');
Route::post('/update-to-cart','App\Http\Controllers\CartController@update_to_cart');


//Checkout Routes...............................................................
Route::get('/login-check', 'App\Http\Controllers\CheckoutController@login_check');
Route::get('/checkout', 'App\Http\Controllers\CheckoutController@checkout');
Route::post('/save-shipping-details', 'App\Http\Controllers\CheckoutController@save_shipping_details');


//Customer Login & Registration Routes...............................................................
Route::get('/customer-logout', 'App\Http\Controllers\CustomerController@customer_logout');
Route::post('/customer-login', 'App\Http\Controllers\CustomerController@customer_login');
Route::post('/customer_registration', 'App\Http\Controllers\CustomerController@customer_registration');
Route::get('/customer-account', 'App\Http\Controllers\CustomerController@customer_account');

//Payment Routes...............................................................................
Route::get('/payment', 'App\Http\Controllers\PaymentController@payment');
Route::post('/placed-order', 'App\Http\Controllers\PaymentController@placed_order');











//Backend Routes....................................................................
Route::get('/admin-login','App\Http\Controllers\AdminController@index');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');
Route::get('/admin-dashboard', 'App\Http\Controllers\SuperAdminController@index');
Route::get('/logout','App\Http\Controllers\SuperAdminController@logout');


//Category Routes......................................................................
Route::get('/add-category','App\Http\Controllers\CategoryController@index');
Route::get('/all-category','App\Http\Controllers\CategoryController@all_category');
Route::post('/save-category','App\Http\Controllers\CategoryController@save_category');
Route::get('/inactive-category/{category_id}','App\Http\Controllers\CategoryController@inactive_category');
Route::get('/active-category/{category_id}','App\Http\Controllers\CategoryController@active_category');
Route::get('/edit-category/{category_id}','App\Http\Controllers\CategoryController@edit_category');
Route::post('/update-category/{category_id}','App\Http\Controllers\CategoryController@update_category');
Route::get('/delete-category/{category_id}','App\Http\Controllers\CategoryController@delete_category');


//Brand Routes......................................................................
Route::get('/add-brand', 'App\Http\Controllers\BrandController@index');
Route::post('/save-brand', 'App\Http\Controllers\BrandController@save_brand');
Route::get('/all-brand', 'App\Http\Controllers\BrandController@all_brand');
Route::get('/inactive-brand/{brand_id}', 'App\Http\Controllers\BrandController@inactive_brand');
Route::get('/active-brand/{brand_id}', 'App\Http\Controllers\BrandController@active_brand');
Route::get('/edit-brand/{brand_id}', 'App\Http\Controllers\BrandController@edit_brand');
Route::post('/update-brand/{brand_id}', 'App\Http\Controllers\BrandController@update_brand');
Route::get('/delete-brand/{brand_id}', 'App\Http\Controllers\BrandController@delete_brand');


//Product Routes......................................................................
Route::get('/add-product', 'App\Http\Controllers\ProductController@index');
Route::post('/save-product', 'App\Http\Controllers\ProductController@save_product');
Route::get('/all-product', 'App\Http\Controllers\ProductController@all_product');
Route::get('/inactive-product/{product_id}', 'App\Http\Controllers\ProductController@inactive_product');
Route::get('/active-product/{product_id}', 'App\Http\Controllers\ProductController@active_product');
Route::get('/delete-product/{product_id}', 'App\Http\Controllers\ProductController@delete_product');
Route::get('/edit-product/{product_id}', 'App\Http\Controllers\ProductController@edit_product');
Route::post('/update-product/{product_id}', 'App\Http\Controllers\ProductController@update_product');


//Slider Routes......................................................................
Route::get('/add-slider', 'App\Http\Controllers\SliderController@index');
Route::post('/save-slider', 'App\Http\Controllers\SliderController@save_slider');
Route::get('/all-slider', 'App\Http\Controllers\SliderController@all_slider');
Route::get('/inactive-slider/{slider_id}', 'App\Http\Controllers\SliderController@inactive_slider');
Route::get('/active-slider/{slider_id}', 'App\Http\Controllers\SliderController@active_slider');
Route::get('/delete-slider/{slider_id}', 'App\Http\Controllers\SliderController@delete_slider');


//Order Routes......................................................................
Route::get('/manage-order', 'App\Http\Controllers\OrderController@manage_order');
Route::get('/view-order/{order_id}', 'App\Http\Controllers\OrderController@view_order');

