<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index(){
    	return view('admin.admin_login');
    }
    public function show_dashboard(){
    	return view('admin_layout');
    }
    public function dashboard(Request $request){
    	$admin_email = $request->email;
    	$admin_password = md5($request->password);

            // echo'<pre>';print_r($admin_email);
    	$result = DB::table('admin_tbl_user')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
    	$admin_user = DB::select('select * from admin_tbl_user where admin_email = :admin_email', ['admin_email' => $admin_email]);
    	foreach ($admin_user as $key => $value) {
    		$admin_name = $value->admin_name;
    	}
    	return view('admin_layout', ['admin_name' => $admin_name]);
    }
    public function logout(){
    	return view('admin.admin_login');
    }
}
