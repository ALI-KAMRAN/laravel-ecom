@extends('adminSide.masterFiles.master')

@section('title')
View Categor
@endsection

@section('content')
<div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Admin Dashboard</h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div>


              </div>
            </div>
          </div>

<table class="table">
	<thead>
		<tr>
			<th># No</th>
			<th>Category Name</th>
			<th>Parent Category</th>
			<th>Create Date</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($categories as $category)
		<tr>
			<td>{{$category->id}}</td>
			<td>{{$category->name}}</td>
				<td>{{$category->parent_category->name ?? 'No Catogory'}}</td>
			<td>{{$category->created_at}}</td>
			<td>
				<a href="{{route('editCategory',$category->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
				<a href="{{route('deleteCategory',$category->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		@endforeach
	</tbody>


</table>






 </div>         
@endsection