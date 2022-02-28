@extends('adminSide.masterFiles.master')

@section('title')
User Data
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

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th># No</th>
			<th>Name</th>
			<th>Email</th>
				<th>Created Data</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $key=>$user)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->created_at}}</td>
			<td>
				<a href="javaseript::void(0)" data-id="{{$user->id}}" class="btn btn-danger delete" ><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		@endforeach
	</tbody>


</table>

</div>         
@endsection

@push('footer-script')
<script>
	$('.delete').on('click',function(){

if(confirm('Are you sure delete this product')){
var id = $(this).data('id');
$.ajax({

  url:'{{route("userDelete")}}',
  method:'post',
  data:{
  	_token:"{{ csrf_token() }}",
  	'id':id
  },
  success: function(data){
  	location.reload();
  }
});
}
});

</script>
@endpush