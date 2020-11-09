<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

Session_start();

class SuperAdminController extends Controller
{
	public function index(){
		$this->AdminAuthCheck();
		return view('admin.admin_content');
	}

    public function logout(){
    	// Session::put('admin_name',null);
    	// Session::put('admin_id',null);

    	Session::flush(); //to flush all data in the session

    	return Redirect ('/admin-login');
	}
	
	public function AdminAuthCheck(){ //check tutorial part 23 to secure slider, product, category, brand. But learning Constructor is much easier.
		$admin_id = Session::get('admin_id');
		if ($admin_id) {
			return;
		}else{
			return Redirect::to('/admin-login')->send();
		}
	}


}
