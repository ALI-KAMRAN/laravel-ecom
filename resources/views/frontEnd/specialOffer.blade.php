@extends('frontEnd.masterFile.master')

@section('title')
All Items
@endsection

@section('content')
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Special offers</li>
    </ul>
	<h4> 20% Discount Special offer<small class="pull-right"> 40 products are available </small></h4>	
	<hr class="soft"/>
	<form class="form-horizontal span6">
		<div class="control-group">
		  <label class="control-label alignL">Sort By </label>
			<select>
              <option>Priduct name A - Z</option>
              <option>Priduct name Z - A</option>
              <option>Priduct Stoke</option>
              <option>Price Lowest first</option>
            </select>
		</div>
	  </form>
	
<br class="clr"/>
<div class="tab-content">
	

	
		<ul class="thumbnails">
			@foreach($all_products as $products)
			<li class="span3">
			  <div class="thumbnail">
				<a href="{{route('productDetails',$products->id)}}"><img src="{{asset('uploads/'.$products->image)}}" alt="image"/></a>
				<div class="caption">
				  <h5>{{$products->name}}</h5>
				  <p> 
					{{$products->ProductDetail->description}}
				  </p>
				  <h4 style="text-align:center"> <a class="btn" href="#">Buy This<i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro; {{$products->price}}</a></h4>
				</div>
			  </div>
			</li>
@endforeach
 </ul>


	<hr class="soft"/>
	
</div>

	<div class="pagination">
		<ul>
		<li><a href="#">&lsaquo;</a></li>
		<li><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#">...</a></li>
		<li><a href="#">&rsaquo;</a></li>
		</ul>
	</div>
<br class="clr"/>
</div>
@endsection

