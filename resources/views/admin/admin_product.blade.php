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
		<div class="btn btn-block btn-primary" style="width: 26px;float: left;font-size: 8px;text-align: center;padding: 6px;">
			<i class="fa fa-search"></i>
		</div>
	</div>
<br>
<br>
<div style="padding: 0 5%;margin-top: 30px;">
    <table class="table table-bordered table-hover dataTable" role="grid" style="width:100%">
    	<thead>
			<tr role="row">
				<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Id</th>
				<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Image</th>
				<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Product Name</th>
				<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Quantity</th>
				<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Category</th>
				<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Price</th>
				<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Edit</th>
				<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($list_pro as $list_pro)
				<tr role="row">
					<td>{{$list_pro['id']}}</td>
					<td><img src="{{URL::to('/public/uploads/product/'.$list_pro['pro_image'][0])}}" alt="" height="60" width="90"></td>
					<td>{{$list_pro['pro_name']}}</td>
					<td>{{$list_pro['pro_qty']}}</td>
					<td>{{$list_pro['pro_cate']}}</td>
					<td>{{$list_pro['pro_price']}}$</td>
					<td>
						<a href="{{URL::to('/admin-editproduct/'.$list_pro['id'])}}" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-edit"></i>
						</a>
					</td>
					<td>
						<a href="{{URL::to('/admin-deleteproduct/'.$list_pro['id'])}}" onclick="return confirm('Are you sure to Delete?')" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-remove"></i>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<br>
<br>
<br>
<form action="{{URL::to('/admin-addproduct')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="row" style="padding: 0 5%;float: left;width: 65%">
		<div class="form-group" style="float: left;width: 100%;">
			<label style="float: left;width: 22%;">Product Image</label>
			<input required type="file" value="" name="product_image[]" class="form-control" style="float: left;width: 60%;" multiple>
		</div>
		<div class="form-group" style="float: left;width: 100%;">
			<label style="float: left;width: 22%;">Product Name</label>
			<input type="text" value="" name="product_name" class="form-control"  style="float: left;width: 60%;">
		</div>
		</br>
		<div class="form-group" style="float: left;width: 100%;margin-top: 6px;">
			<label style="float: left;width: 22%;">Quantity</label>
			<input style="float: left;width: 60%;" class="form-control"  type="text" value="" name="product_qty"  onkeyup="this.value=this.value.replace(/[^\d]/,'')">
		</div>
		</br>
		<div class="form-group" style="float: left;width: 100%;margin-top: 6px;">
			<label style="float: left;width: 22%;">Atributte</label>
			<input style="float: left;width: 60%;" class="form-control" type="text" value="" id="att_pro">
			<input type="button"  class="btn btn-block btn-primary" value="Add" id="add_attribute" style="float: left;width: 50px;margin-left: 10px;">
			<div class="div_list_attr" style="float: left;margin-left: 22%;background-color: #ffffff;margin-top: 5px;width: 60%;display: none;">
				<ul class="list_attribute">

				</ul>
			</div>
		</div>
		</br>
		<div class="form-group" style="float: left;width: 100%;margin-top: 6px;">
			<label style="float: left;width: 22%;">Price</label>
			<input style="float: left;width: 60%;" class="form-control"  type="text" value="" name="product_price" onkeypress="return isNumberKey(event,this.id)" id="price_product">
			$
		</div>
		</br>
		<div class="form-group" style="float: left;width: 100%;margin-top: 6px;">
			<label style="float: left;width: 22%;">Category</label>
			<select style="float: left;width: 60%;" name="product_cate" class="form-control" >
				<option>Select Category</option>
				@foreach ($list_cate as $list_cate)
						<option value="{{$list_cate['id']}}">{{$list_cate['cate_name']}}</option>
				@endforeach
			</select>
		</div>
		</br>
		<div class="form-group" style="float: left;width: 100%;margin-top: 6px;">
			<label style="float: left;width: 22%;">Product Description</label>
			<textarea  style="float: left;width: 60%;" rows="2" cols="25" name="product_desc" class="form-control" ></textarea>
		</div>
		<button type="submit" class="btn btn-block btn-primary" id="get_list_arrtibute" style="float: left;margin-top: 6px;">Add Product</button>
	</div>
</form>
@endsection