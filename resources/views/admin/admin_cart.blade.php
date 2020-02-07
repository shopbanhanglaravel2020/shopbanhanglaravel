@extends('admin_layout')
@section('addcart')
<div style="float: left;width: 30%;margin-left:5%;">
		<label style="float: left;width: 30%;">Search Product</label>
		<input type="text" name="product_search" id="search_product_cart" value="" style="width: 60%;float: left;">
		<a href="#" class="btn btn-block btn-primary" style="width: 26px;float: left;font-size: 8px;text-align: center;padding: 6px;">
			<i class="fa fa-search"></i>
		</a>
		<div class="result_search_cart" style="float: left;width: 90%;margin-top: 6px"></div>
		<input type="button" class="btn btn-block btn-primary" id="btn_addtocart" style="float: left;;width: 60%;margin-top: 6px;margin-bottom:5%;display: none;" value="Add to Cart">
	</div>
<form action="{{URL::to('/admin-cartmakeorder/')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="div_tbl_cart" style="padding: 0 5%;margin-top: 30px;display: none;">
	    <table style="width:100%" class="cart_table">
			<tr>
				<th>Id</th>
				<th>Image</th>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Category</th>
				<th>Price</th>
				<th>Delete</th>
			</tr>
		</table>
		<div style="width: 100%;border: 1px solid #dddddd;float: right;padding: 9px;text-align: right;">
			<span>Total Price:</span>
			<span class="total_price_cart">0</span>
			<span>$</span>
		</div>
	</div>
	<div class="infor_before_submit"></div>
	<button type="button" class="btn btn-block btn-primary" id="btn_input_profile" style="float: right;width: 9%;margin-top: 6px;display: block;margin: 1% 5%;display: none;">Make Order</button>

	<div class="cart_profile row" style="padding: 1% 7%;float: left;width: 100%;display: none;">
		<div class="form-group div_search_cus" style="float: left;width: 50%;margin-right:1px;">
			<label style="float: left;width: 25%;">Search Customer</label>
			<input type="text" value="" name="search_customer" id="search_customer" class="form-control"  style="float: left;width: 50%;">
			<a href="#" class="btn btn-block btn-primary" style="width: 35px;float: left;font-size: 14px;text-align: center;padding: 6px;">
				<i class="fa fa-search"></i>
			</a>
			<div class="result_search_customer" style=""></div>
		</div>
	
		<div class="form-group" style="float: left;width: 50%;">
			<label style="float: left;width: 15%;">Name</label>
			<input type="text" value="" name="cart_name" class="form-control"  style="float: left;width: 80%;" required>
		</div>
		<div class="form-group" style="float: left;width: 50%;">
			<label style="float: left;width: 15%;">Email</label>
			<input style="float: left;width: 80%;" class="form-control"  type="text" value="" name="cart_email" required>
		</div>
		<div class="form-group" style="float: left;width: 50%;">
			<label style="float: left;width: 15%;">Phone</label>
			<input style="float: left;width: 80%;" class="form-control" type="text" value="" name="cart_phone" onkeyup="this.value=this.value.replace(/[^\d]/,'')" required>
		</div>
		<div class="form-group" style="float: left;width: 50%;">
			<label style="float: left;width: 15%;">Address</label>
			<input style="float: left;width: 80%;" class="form-control" type="text" value="" name="cart_address" required>
		</div>
		<div class="form-group" style="float: left;width: 100%;">
			<label style="float: left;width: 7.5%;">Message</label>
			<textarea  style="float: left;width: 90%;" rows="2" cols="30" name="cart_mess" class="form-control" required></textarea>
		</div>
		<div class="form-group" style="float: left;width: 50%;">
			<label style="float: left;width: 15%;">Payment Type</label>
			<select style="float: left;width: 80%;" class="form-control" name="cart_payment_type">
				<option value="0">Select Payment Type</option>
				<option value="1">Paypal</option>
				<option value="0">Master Card</option>
			</select>
		</div>
		<input type="hidden" value="0" name="id_customer">
	</div>
	<button type="submit" class="btn btn-block btn-primary" id="btn_makeorder" style="float: right;width: 9%;margin-top: 6px;display: block;margin: 1% 5%;display: none;">Submit</button>
</form>
@endsection