@extends('admin_layout')
@section('addcategory')

<style>
table, th, td {
  border: 1px solid black;
  text-align: center;
}
</style>
	<div style="padding: 0 5%;margin-top: 30px;">
	    <table style="width:100%">
			<tr>
				<th>id</th>
				<th>Category Name</th>
				<th>Description</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			@foreach ($list_cate as $list_cate)
				<tr>
					<th>{{$list_cate['id']}}</th>
					<th>{{$list_cate['cate_name']}}</th>
					<th>{{$list_cate['cate_desc']}}</th>
					<th>
						<a href="{{URL::to('/admin-editcategory/'.$list_cate['id'])}}" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-edit"></i>
						</a>
					</th>
					<th>
						<a href="{{URL::to('/admin-deletecategory/'.$list_cate['id'])}}" onclick="return confirm('Are you sure to Delete?')" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-remove"></i>
						</a>
						<!-- <a href="#" class="dropdown-toggle" id="delete_cate" data-toggle="dropdown">
							<i class="fa fa-remove"></i>
						</a> -->
					</th>
				</tr>
			@endforeach
		</table>
	</div>
	<br>
	<br>
	<br>
	<form action="{{URL::to('/admin-addcategory')}}" method="post">
		@csrf
	<div class="row" style="padding: 0 5%;">
	<label>Category Name</label>
	<input type="text" value="" name="category_name">
	<br>
	<br>
	<br>
	<label>Descripion</label>
	<textarea name="category_description" rows="2" cols="25" ></textarea>
	<br>
	<br>
	<br>
	<button type="submit" class="btn btn-block btn-primary" >Add Category</button>
	</div>
	</form>
@endsection