@extends('admin_layout')
@section('addproduct')
<style>
table, th, td {
  border: 1px solid black;
  text-align: center;
}
</style>
<br>
<br>


	<div style="float: left;width: 30%;margin-left:5%;">
		<input type="text" name="product_search" id="search_product" value="" style="width: 60%;float: left;">
		<div class="result_search"></div>
		<a href="#" class="btn btn-block btn-primary" style="width: 26px;float: left;font-size: 8px;text-align: center;padding: 6px;">
			<i class="fa fa-search"></i>
		</a>
	</div>
<br>
<br>
<div style="padding: 0 5%;margin-top: 30px;">
    <table style="width:100%">
		<tr>
			<th>Id</th>
			<th>Image</th>
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Category</th>
			<th>Price</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		@foreach ($list_pro as $list_pro)
			<tr>
				<th>{{$list_pro['id']}}</th>
				<th><img src="{{URL::to('/public/uploads/product/'.$list_pro['pro_image'])}}" alt="" height="15" width="30"></th>
				<th>{{$list_pro['pro_name']}}</th>
				<th>{{$list_pro['pro_qty']}}</th>
				<th>{{$list_pro['pro_cate']}}</th>
				<th>{{$list_pro['pro_price']}}$</th>
				<th>
					<a href="{{URL::to('/admin-editproduct/'.$list_pro['id'])}}" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-edit"></i>
					</a>
				</th>
				<th>
					<a href="{{URL::to('/admin-deleteproduct/'.$list_pro['id'])}}" onclick="return confirm('Are you sure to Delete?')" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-remove"></i>
					</a>
				</th>
			</tr>
		@endforeach
	</table>
</div>
<br>
<br>
<br>
<form action="{{URL::to('/admin-addproduct')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="row" style="padding: 0 5%;float: left;width: 50%">
		<div class="form-group" style="float: left;width: 100%;">
			<label style="float: left;width: 30%;">Product Image</label>
			<input type="file" value="" name="product_image" class="form-control" style="float: left;width: 60%;">
		</div>
		<div class="form-group" style="float: left;width: 100%;">
			<label style="float: left;width: 30%;">Product Name</label>
			<input type="text" value="" name="product_name" class="form-control"  style="float: left;width: 60%;">
		</div>
		</br>
		<div class="form-group" style="float: left;width: 100%;margin-top: 6px;">
			<label style="float: left;width: 30%;">Quantity</label>
			<input style="float: left;width: 60%;" class="form-control"  type="text" value="" name="product_qty"  onkeyup="this.value=this.value.replace(/[^\d]/,'')">
		</div>
		</br>
		<div class="form-group" style="float: left;width: 100%;margin-top: 6px;">
			<label style="float: left;width: 30%;">Price</label>
			<input style="float: left;width: 60%;" class="form-control"  type="text" value="" name="product_price" onkeypress="return isNumberKey(event,this.id)" id="price_product">
			$
		</div>
		</br>
		<div class="form-group" style="float: left;width: 100%;margin-top: 6px;">
			<label style="float: left;width: 30%;">Category</label>
			<select style="float: left;width: 60%;" name="product_cate" class="form-control" >
				<option>Select Category</option>
				@foreach ($list_cate as $list_cate)
						<option value="{{$list_cate['id']}}">{{$list_cate['cate_name']}}</option>
				@endforeach
			</select>
		</div>
		</br>
		<div class="form-group" style="float: left;width: 100%;margin-top: 6px;">
			<label style="float: left;width: 30%;">Product Description</label>
			<textarea  style="float: left;width: 60%;" rows="2" cols="25" name="product_desc" class="form-control" ></textarea>
		</div>
		<button type="submit" class="btn btn-block btn-primary" style="float: left;margin-top: 6px;">Add Product</button>
	</div>
</form>
@endsection