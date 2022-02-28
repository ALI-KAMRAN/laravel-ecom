@extends('adminSide.masterFiles.master')

@section('title')
Products Booking
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
			<th>User Name</th>
				<th>Qty</th>
				<th>Total Amount</th>
				<th>Payment Status</th>
				<th>Booking Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($booking_products as $key=>$booking_product)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$booking_product->product->name}}</td>
				<td>{{$booking_product->user->name}}</td>
				<td>{{$booking_product->qty}}</td>
							<td>{{$booking_product->qty * $booking_product->product->price}}</td>
										<td>{{$booking_product->payment_status}}</td>
										<td>
											@php $book_status = $booking_product->booking_status; @endphp
											<select class="booking_status" data-id="{{$booking_product->id}}">
												<option value="0" @if($book_status == '0') selected @endif>In Progress</option>
													<option value="1" @if($book_status == '1') selected @endif>Booking Cancel</option>
														<option value="2" @if($book_status == '2') selected @endif>Booked</option>


											</select>

										</td>
			<td>
				<a href="javaseript::void(0)" data-id="{{$booking_product->id}}" class="btn btn-danger delete" ><i class="fa fa-trash"></i></a>
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

if(confirm('Are you sure delete this booking product')){
var id = $(this).data('id');
$.ajax({

  url:'{{route("productBookDelete")}}',
  
  data:{
  	
  	'id':id
  },
  success: function(data){
  	location.reload();
  }
});
}
});


$('.booking_status').on('change',function(){
	var booking_status = $(this).val();
	var id = $(this).data('id');
	$.ajax({
url:'{{route("bookingProductStatus")}}',
  
  data:{
  	'booking_status':booking_status,
  	'id':id,
  },
	});
});



</script>
@endpush