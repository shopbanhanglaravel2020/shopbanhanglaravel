@extends('admin_layout')
@section('addcart')
	<div style="padding: 0 5%;margin-top: 30px;">
	    <table style="width:100%">
			<tr>
				<th>id</th>
				<th>Attribute Name</th>
				<th>Value Count</th>
				<th>View</th>
			</tr>
			@foreach ($list_attr as $list_attr)
				<tr>
					<th>{{$list_attr['id_attribute']}}</th>
					<th>{{$list_attr['name']}}</th>
					<th>0</th>
					<th>
						<a href="{{URL::to('/admin-value_attribute/'.$list_attr['id_attribute'])}}" class="">
							<i class="fa fa-edit"></i>
						</a>
					</th>
				</tr>
			@endforeach
		</table>
	</div>
	<br>
	<br>
	<br>
	<form action="{{URL::to('/admin-addattribute')}}" method="post">
		@csrf
		<div class="col-lg-4" style="padding: 0 5%;">
			<div class="form-group">
				<label>Attrbute Name</label>
				<input type="text" value="" name="attribute_name">
			</div>
			<div class="form-group">
				<label>Public Name</label>
				<input type="text" value="" name="attribute_public_name">
			</div>
			<div class="form-group">
				<label>Attrbute Group</label>
				<select name="attribute_group">
					<option value="0">Select Group Attribute</option>
					<option value="1">Select</option>
					<option value="2">Color</option>
				</select>
			</div>
			<div class="form-group input_color_picker" style="display: none;">
				<label>Color</label>
				<input type="color" id="color_picker" value="#ffffff">
				<input type="text" name="name_color_picker" id="name_color_picker" value="">
			</div>
			<button type="submit" class="btn btn-block btn-primary" style="width: 38%;">Add Attribute</button>
		</div>
	</form>
@endsection