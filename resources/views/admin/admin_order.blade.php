@extends('admin_layout')
@section('order')
<div style="padding: 0 5%;margin-top: 30px;">
    <table style="width:100%">
		<tr>
			<th>Id</th>
			<th>Delivery</th>
			<th>Customer Name</th>
			<th>Total</th>
			<th>Payment</th>
			<th>Status</th>
			<th>Date</th>
			<th>View</th>
		</tr>
		@foreach ($list_order as $list_order)
			<tr>
				<th>{{$list_order['id']}}</th>
				<th>{{$list_order['delivery_address']}}</th>
				<th>{{$list_order['customer']->name}}</th>
				<th>{{$list_order['total_price']}}$</th>
				@if ($list_order['payment_type'] == 0)
					<th><strong>Master Cart</strong></th>
				@else
					<th><strong>Paypal</strong></th>
				@endif
				@if ($list_order['status'] == 0)
					<th><strong>Awaiting check payment</strong></th>
				@elseif ($list_order['status'] == 1)
					<th><strong>Payment accepted</strong></th>
				@else
					<th><strong>Canceled</strong></th>
				@endif
				<th>{{$list_order['created_at']}}</th>
				<th>
					<a href="{{URL::to('/admin-orderview/'.$list_order['id'])}}" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-edit"></i>
					</a>
				</th>
			</tr>
		@endforeach
	</table>
</div>
@endsection