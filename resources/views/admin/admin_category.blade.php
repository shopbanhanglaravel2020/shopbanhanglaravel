@extends('admin_layout')
@section('addcategory')
<table class="table table-striped table-dark" style="border:1px solid #D0D0D0;margin-left: 17px; margin-top: 10px">
  <thead>
    <tr>
      <th scope="col" class="col-md-1">#</th>
      <th scope="col" class="col-md-2">Name</th>
      <th scope="col" class="col-md-4">Parent</th>
      <th scope="col" class="col-md-4">Desc</th>
	  <th scope="col" class="col-md-1"><a href="#" style="color:black"><i class="far fa-plus-square"></i></a></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
	  <td><a href="#" style="color:black"><i class="fas fa-edit" style="padding-right:15px"></i></a><a href="#" style="color:black"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
	  <td><a href="#" style="color:black"><i class="fas fa-edit" style="padding-right:15px"></i></a><a href="#" style="color:black"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
	  <td><a href="#" style="color:black"><i class="fas fa-edit" style="padding-right:15px"></i></a><a href="#" style="color:black"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
  </tbody>
</table>
@endsection