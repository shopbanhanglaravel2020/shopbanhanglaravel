<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
// session_start();

class AddCategory extends Controller
{
    public function index(){
    	$cate = DB::select('select * from tbl_category');
    	$list_cate = array();
    	foreach ($cate as $key => $value) {
    		$list_cate[$key]['id'] = $value->id;
    		$list_cate[$key]['cate_name'] = $value->category_name;
    		$list_cate[$key]['cate_desc'] = $value->category_desc;
    	}
    	// echo'<pre>';print_r($list_cate);
    	return view('admin.admin_category', ['admin_name' => 'Thai Thanh Tung', 'list_cate' => $list_cate]);
    }
    public function addcategory(Request $request){
    	$category_name = $request->category_name;
    	$category_desc = $request->category_description;
    	// echo'<pre>';print_r($category_name);
    	DB::insert('insert into tbl_category (category_name, category_desc) values (?, ?)', [$category_name, $category_desc]);
    	
        // Session::put('message', 'Add Category success!');
        return Redirect::to('admin-category');
    }
    public function editcategory($id_cate_select){
        $cate_edit = DB::select('select * from tbl_category where id = :id', ['id' => $id_cate_select] );
        // echo'<pre>';print_r($cate_edit);
        return view('admin.admin_editcategory', ['admin_name' => 'Thai Thanh Tung', 'cate_edit' => $cate_edit[0]]);
    }
    public function deletecategory($id_cate_delete){
        DB::table('tbl_category')->where('id',$id_cate_delete)->delete();
        // echo'<pre>';print_r($cate_edit);
        return Redirect::to('admin-category');
    }
    public function updatecategory(Request $request,$cate_update_id){
        $data = array();
        $data['cate_update_name'] = $request->cate_update_name;
        $data['cate_update_desc'] = $request->cate_update_desc;
        // echo'<pre>';print_r($cate_update_id);
        DB::table('tbl_category')->where('id',$cate_update_id)->update($data);
        
        return Redirect::to('admin-category');
    }
}
