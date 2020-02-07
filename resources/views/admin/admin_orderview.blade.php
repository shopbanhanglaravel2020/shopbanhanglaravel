@extends('admin_layout')
@section('order_view')
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
				<th><img src="{{URL::to('/public/uploads/product/'.$list_pro['pro_image'])}}" alt="" height="60" width="90"></th>
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
@endsection