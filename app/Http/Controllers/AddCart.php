<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddCart extends Controller
{
    public function index(){
    	return view('admin.admin_cart', ['admin_name' => 'Thai Thanh Tung']);
    }
    public function getSearchAjax(Request $request){
        if($request->get('key_word'))
        {
            $key_word = $request->get('key_word');
            $data = DB::table('tbl_product')->where('name', 'LIKE', "%{$key_word}%")->get();
            // echo'<pre>';print_r($data);
            if (empty($data[0])){
            	$output = "<p>Can't find any product like you want.</p>";
            } else {
	            $output = '<select class="select_product_cart"  onchange="add_cart(this.value);" style="display:block;float:left;width:100%;">';
	            $output .= '<option value="0">Select Product</option>';
	            foreach($data as $value)
	            {
	               $output .= '<option value="'. $value->id .'">';
	               $output .= $value->name;
	               $output .= '</option>';
	            }
	            $output .= '</select>';
       		}
            echo $output;
       }
    }
    public function addCartAjax(Request $request){
        if($request->get('id_product'))
        {
            $id_product = $request->get('id_product');
            $data = DB::table('tbl_product')->where('id',$id_product)->get();
            $output = '';
            // echo'<pre>';print_r($data);
            if (!empty($data)) {
	            $output .= '<tr class="check_exist_pro check_exist_'.$data[0]->id.'"><th class="id_pro">'.$data[0]->id.'</th>';
	            $output .= '<th><img src="public/uploads/product/'.$data[0]->image.'" alt="" height="40" width="60"></th>';
	            $output .= '<th>'.$data[0]->name.'</th>';
	            $output .= '<th class="qty_pro qty_pro_cart_'.$data[0]->id.'">1</th>';
	            $output .= '<th>'.$data[0]->category.'</th>';
	            $output .= '<th class="price_pro"><p style="float:left;">'.$data[0]->price.'</p><span style="margin-left:2px;">$</span></th>';
				$output .= '<th>';
				$infor_alert = "'Are you sure to Delete?'";
				$output .= '<a href="#" onclick="delete_product('.$data[0]->id.')" class="dropdown-toggle" data-toggle="dropdown">';
				$output .= '<i class="fa fa-remove"></i>';
				$output .= '</a></th></tr>';
            }
            echo $output;
       }
    }
    public function getSearchCustomer(Request $request){
        if($request->get('key_word'))
        {
            $key_word = $request->get('key_word');
            $data = DB::table('tbl_customer')->where('name', 'LIKE', "%{$key_word}%")->get();
            // echo'<pre>';print_r($data);
            $output = '<ul class="dropdown-menu select_customer" style="display:block; position:relative;left: 25%;">';
            foreach($data as $value)
            {
               $output .= '<li><a href="#" onclick="select_cus('.$value->id.');">'.$value->name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
       }
    }
    public function selectcustomer(Request $request){
        if($request->get('id_customer'))
        {
            $id_customer = $request->get('id_customer');
            $data = DB::table('tbl_customer')->where('id', '=', "$id_customer")->get();
            // echo'<pre>';print_r($data);
            
            echo $data;
        }
    }
    public function MakeOrder(Request $request){
        $data = array();
        $customer = array();
        $arr_pro = array();
        $data_pro_cart = array();
        $list_id_pro = explode(",", rtrim($request->list_id_pro, ","));
        $list_qty_pro = explode(",", rtrim($request->list_qty_pro, ","));
        $total_price_cart = $request->total_price_cart;
        $order_message = $request->cart_mess;
        $order_payment_type = $request->cart_payment_type;
        $id_customer = $request->id_customer;
        $customer['name'] = $request->cart_name;
        $customer['email'] = $request->cart_email;
        $customer['phone'] = $request->cart_phone;
        $customer['address'] = $request->cart_address;
        // echo'<pre>';print_r($customer);
        if ($id_customer == "0") {
   			$customer['created_at'] = date("Y-m-d H:i:s");
        	DB::table('tbl_customer')->insert($customer);
        	$id_customer = DB::getPdo()->lastInsertId();
        } else {
   			$customer['updated_at'] = date("Y-m-d H:i:s");
        	DB::table('tbl_customer')->where('id',$id_customer)->update($customer);
        }
        $data['customer_id'] = $id_customer;
        $data['address'] = $request->cart_address;
        $data['payment_type'] = $order_payment_type;
        $data['status'] = '0';
        $data['total_price'] = $total_price_cart;
        $data['message'] = $order_message;
        $data['created_at'] = date("Y-m-d H:i:s");
        DB::table('tbl_order')->insert($data);
        $id_order = DB::getPdo()->lastInsertId();
        // echo'<pre>';print_r($id_order);
        foreach ($list_id_pro as $key => $value) {
    	    $pro_cart = DB::select('select * from tbl_product where id = :id', ['id' => $value]);
    	    $arr_pro[] = $pro_cart[0];
        }
        foreach ($arr_pro as $key => $value) {
        	$data_pro_cart[$key]['order_id'] = $id_order;
        	$data_pro_cart[$key]['product_id'] = $value->id;
        	$data_pro_cart[$key]['quantity'] = $list_qty_pro[$key];
        	$data_pro_cart[$key]['created_at'] = date("Y-m-d H:i:s");
        	DB::table('tbl_order_items')->insert($data_pro_cart[$key]);
        }
         // echo'<pre>';print_r($data_pro_cart);
        
        return view('admin.admin_cart', ['admin_name' => 'Thai Thanh Tung']);
    }
}
