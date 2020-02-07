<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\Cart;
use Illuminate\Support\ServiceProvider;

class Order extends Controller
{
    public function index(){
    	$order = DB::select('select * from tbl_order');
    	$list_order = array();
    	foreach ($order as $key => $value) {
    		$customer = DB::select('select * from tbl_customer where id = :id', ['id' => $value->customer_id] );
    		$list_order[$key]['delivery_address'] = $value->delivery_address;
    		$list_order[$key]['payment_type'] = $value->payment_type;
    		$list_order[$key]['status'] = $value->status;
    		$list_order[$key]['total_price'] = $value->total_price;
    		$list_order[$key]['message'] = $value->message;
    		$list_order[$key]['customer'] = $customer[0];
    		$list_order[$key]['created_at'] = $value->created_at;
    		$list_order[$key]['id'] = $value->id;
    	}
    	// echo'<pre>';print_r($list_order);
    	return view('admin.admin_order', ['admin_name' => 'Thai Thanh Tung', 'list_order' => $list_order]);
    }
    public function selectOrder($id_order_select){
        $list_pro = DB::select('select * from tbl_order_items where id = :id', ['id' => $id_order_select] );
        $product = array();
        // foreach ($list_pro as $key => $value) {
        //     $product[$key]['id'] = $value->id;
        //     $product[$key]['pro_name'] = $value->name;
        //     $product[$key]['pro_qty'] = $value->quantity;
        //     $product[$key]['pro_cate'] = $value->category;
        //     $product[$key]['pro_desc'] = $value->description;
        //     $product[$key]['pro_price'] = $value->price;
        //     $product[$key]['pro_image'] = $value->image;
        //     foreach ($list_cate as $key1 => $value1) {
        //         if ($product[$key]['pro_cate'] == $value1['id']) {
        //             $product[$key]['pro_cate'] = $value1['cate_name'];
        //         }
        //     }
        // }
    	// echo'<pre>';print_r($list_order);
    	return view('admin.admin_order', ['admin_name' => 'Thai Thanh Tung', 'list_order' => $list_order]);
    }
}
