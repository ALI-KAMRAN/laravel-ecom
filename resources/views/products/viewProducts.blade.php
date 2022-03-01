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

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th># No</th>
			<th>Product Name</th>
			<th>Product Category</th>
				<th>Product Price</th>
				<th>Product Details</th>
					<th>Product Image</th>
						
			<th>Create Date</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $product)
		<tr>
			<td>{{$product->id}}</td>
			<td>{{$product->name}}</td>
				<td>
					@if($product->category_id)
					{{$product->category->name}}
           @endif
				</td>
				<td>{{$product->price}}</td>
				<td><button><a href="{{route('productExtraDetails',$product->id)}}">Add Details</a></button></td>
				<td><img src="{{asset('uploads/'.$product->image)}}" style="height:80px;width:80px"></td>
			<td>{{$product->created_at}}</td>
			<td>
				<a href="{{route('productsEdit',$product->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
				<a href="javascript::void(0)" data-id="{{$product->id}}" class="btn btn-danger delete"><i class="fa fa-trash"></i></a>
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

  url:'{{route("productsDelete")}}',

  data:{
  
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