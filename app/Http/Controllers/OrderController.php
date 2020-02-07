<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
    	$list_order = DB::select('select * from tbl_order');
    	return view('admin.admin_order', ['admin_name' => 'Thai Thanh Tung']);
    }
}
