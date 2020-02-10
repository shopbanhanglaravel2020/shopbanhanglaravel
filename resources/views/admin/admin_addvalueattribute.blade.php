@extends('admin_layout')
@section('addcart')
	@if(session('thongbao'))
		<p> {{ session('thongbao') }} </p>
	@endif
	<div style="padding: 0 5%;margin-top: 30px;">
	    <table style="width:100%">
			<tr>
				<th>id</th>
				<th>Value Name</th>
				@if ($is_color == 1)
					<th>Color</th>
				@endif
				<th>Edit</th>
			</tr>
			@foreach ($list_value as $list_value)
				<tr>
					<th>{{$list_value->id}}</th>
					@if ($is_color == 1)
						<th>{{$list_value->value}}</th>
						<th><div style="border: 12px solid {{$list_value->color}};width: 50px;"></div></th>
					@else
						<th>{{$list_value->value}}</th>
					@endif
					<th>
						<a href="{{URL::to('/admin-attvaluedelete/'.$list_value->id)}}" class="" >
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
	<form action="{{URL::to('/admin-addvalueaddtribute')}}" method="post">
		@csrf
		<input type="hidden" value="{{$id_attribute}}" name="id_attribute">
		<div class="col-lg-4" style="padding: 0 5%;">
			<div class="form-group">
				<label>Value</label>
				<input type="text" value="" name="attribute_value">
			</div>
			@if ($is_color == 1)
				<div class="form-group input_color_picker" style="">
					<label>Color</label>
					<input type="text" name="attribute_color" id="attribute_color" value="#ffffff">
					<input type="color" id="color_picker" value="#ffffff">
				</div>
			@else
				<input type="text" name="attribute_color" id="" value="">
			@endif
			<button type="submit" class="btn btn-block btn-primary" style="width: 38%;">Add Attribute</button>
		</div>
	</form>
@endsection