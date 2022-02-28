@extends('frontEnd.masterFile.master')

@section('title')
Cart
@endsection

@section('content')
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART [ <small>3 Item(s) </small>]<a href="{{route('homePage')}}" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft"/>
		
			
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Name</th>
                  <th>Quantity/Update</th>
                  <th>Select</th>
				  <th>Price</th>
                  
				</tr>
              </thead>
              <tbody>
              	@php $sum = 0; @endphp
              @foreach($carts as $cart)
              @php $sum = $sum + $cart->product->price; @endphp
                <tr>
                  <td> <img width="60" src="{{asset('uploads/'.$cart->product->image)}}" style="width:70px;height:70px" alt="image"/></td>
                  <td>{{$cart->product->name}}<br/></td>
				  <td>
					<div class="input-append"><input class="span1" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" value="{{$cart->qty}}" type="number"><button class="btn" type="button"><i class="icon-minus"></i></button><button class="btn" type="button"><i class="icon-plus"></i></button><button class="btn btn-danger btn_close" data-id="{{$cart->id}}" type="button"><i class="icon-remove icon-white"></i></button>				</div>
				  </td>
				          <td><input type="checkbox" name="product_select[]" cart-id="{{$cart->id}}"></td>
                  <td>RS {{$cart->product->price}}</td>
                   </tr>
		@endforeach
			<tr>
<td colspan="4" style="text-align:right">Total Price:	</td>
                  <td>RS {{$sum}}</td>
                </tr>
				
                 
				 <tr>
                  <td colspan="4" style="text-align:right"><strong></strong></td>
                  <td class="label label-important buy_product" style="display:block;cursor: pointer;"> <strong> BUY </strong></td>
                </tr>
				</tbody>
            </table>
		
		
     
	
	
</div>
@endsection

@push('footer-script')
<script>
	
	$('.btn_close').on('click',function(){

if(confirm('Are you sure delete this product item')){
var id = $(this).data('id');
$.ajax({

  url:'{{route("cartDelete")}}',
  
  data:{
  	'id':id
  },
  success: function(data){
  	location.reload();
  }
});
}
});

$('.buy_product').on('click',function(){
var cart_id = [];
jQuery('input[name="product_select[]"]:checkbox:checked').each(function(i){
cart_id[i] = $(this).attr('cart-id');
});
if(cart_id.length == 0){
alert('Please select at least one product');
}else{
$.ajax({
url:'{{route("productBooking")}}',
type:'post',
data:{
	cart_id:cart_id,
	_token:'{{csrf_token()}}'
},
success:function(data){
	location.reload();
}
});
}
});
</script>

@endpush