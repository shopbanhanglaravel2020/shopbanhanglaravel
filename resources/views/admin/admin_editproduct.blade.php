@extends('admin_layout')
@section('editproduct')
<form action="{{URL::to('/admin-updateproduct/'.$pro_edit->id)}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="row" style="padding: 0 5%;float: left;width: 100%;margin-top: 10px;">
		<div class="productTabs col-lg-2">
			<div class="list-group">
				<a class="list-group-item" id="link-Informations" href="">Information</a>
				<a class="list-group-item" id="link-Prices" href="">Prices</a>
				<a class="list-group-item selected" id="link-Combinations" href="">Combinations</a>
				<a class="list-group-item selected" id="link-Quantities" href="">Quantities</a>
				<a class="list-group-item selected" id="link-Images" href="">Images</a>
			</div>
		</div>
		<div style="float: left;width: 70%;">
			<div class="form-group" style="float: left;width: 100%;">
				@foreach ($pro_edit->image as $list_img)
					<img src="{{URL::to('/public/uploads/product/'.$list_img)}}" alt="" height="90" width="120" style="margin-right: 5px;">
				@endforeach
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
				<label style="float: left;width: 30%;">Combination</label>
				<select style="float: left;width: 60%;" class="form-control" id="select_attr_name">
					<option value="0">Select Attribute Name</option>
					@foreach ($att_name as $att_name)
						<option value="{{$att_name->id_attribute}}">{{$att_name->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group" style="float: left;width: 100%;margin-top: 6px;">
				<label style="float: left;width: 30%;">Value Attribute</label>
				<div class="value_attribute" style="float: left;width: 60%;">

				</div>
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
		</div>
	</div>
	<button type="submit" class="btn btn-block btn-primary" style="float: left;margin-top: 6px;">Update Product</button>
</form>
@endsection