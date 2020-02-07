@extends('admin_layout')
@section('editproduct')
<form action="{{URL::to('/admin-updateproduct/'.$pro_edit->id)}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="row" style="padding: 0 5%;float: left;width: 50%">
		<div class="form-group" style="float: left;width: 100%;">
			<img src="{{URL::to('/public/uploads/product/'.$pro_edit->image)}}" alt="" height="150" width="300">
		</div>
		<div class="form-group" style="float: left;width: 100%;">
			<label style="float: left;width: 30%;">Product Image</label>
			<input type="file" value="" name="product_image" class="form-control" style="float: left;width: 60%;">
		</div>
		<div class="form-group" style="float: left;width: 100%;">
			<label style="float: left;width: 30%;">Product Name</label>
			<input type="text" value="{{$pro_edit->name}}" name="product_name" class="form-control"  style="float: left;width: 60%;">
		</div>
		</br>
		<div class="form-group" style="float: left;width: 100%;margin-top: 6px;">
			<label style="float: left;width: 30%;">Quantity</label>
			<input style="float: left;width: 60%;" class="form-control"  type="text" value="{{$pro_edit->quantity}}" name="product_qty"  onkeyup="this.value=this.value.replace(/[^\d]/,'')">
		</div>
		</br>
		<div class="form-group" style="float: left;width: 100%;margin-top: 6px;">
			<label style="float: left;width: 30%;">Price</label>
			<input style="float: left;width: 60%;" class="form-control" type="text" value="{{$pro_edit->price}}" name="product_price" onkeypress="return isNumberKey(event,this.id)" id="price_product">
			$
		</div>
		</br>
		<div class="form-group" style="float: left;width: 100%;margin-top: 6px;">
			<label style="float: left;width: 30%;">Category</label>
			<select style="float: left;width: 60%;" name="product_cate" class="form-control" >
				<option>Select Category</option>
				@foreach ($list_cate as $list_cate)
						<option value="{{$list_cate['id']}}"
						<?php
							if ($pro_edit->category == $list_cate['id']) {
						?>
						selected
						<?php
							}
						?>
						>{{$list_cate['cate_name']}}</option>
				@endforeach
			</select>
		</div>
		</br>
		<div class="form-group" style="float: left;width: 100%;margin-top: 6px;">
			<label style="float: left;width: 30%;">Product Description</label>
			<textarea  style="float: left;width: 60%;" rows="2" cols="25" name="product_desc" class="form-control" >{{$pro_edit->description}}</textarea>
		</div>
		<button type="submit" class="btn btn-block btn-primary" style="float: left;margin-top: 6px;">Update Product</button>
	</div>
</form>
@endsection