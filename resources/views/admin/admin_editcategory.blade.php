@extends('admin_layout')
@section('editcategory')

<form action="{{URL::to('/admin-updatecategory'/$cate_edit->id)}}" method="post">
	@csrf
<div class="row" style="padding: 0 5%;">
<label>Category Name</label>
<input type="text" value="{{$cate_edit->category_name}}" name="cate_update_name">
<br>
<br>
<br>
<label>Descripion</label>
<input type="text" value="{{$cate_edit->category_desc}}" name="cate_update_desc">
<br>
<br>
<br>
<button type="submit" class="btn btn-block btn-primary" >Update Category</button>
</div>
</form>
@endsection