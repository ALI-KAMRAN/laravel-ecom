@extends('frontEnd.masterFile.master')

@section('title')
Burger Page
@endsection

@section('style')

@endsection

@section('content')
<div class="span9">
<ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Burger</li>
    </ul>
<h4>BURGER PAGE </h4>
			  <ul class="thumbnails">
			  	@foreach($burger as $burger)
				<li class="span3">
				  <div class="thumbnail">
					<a  href="product_details.html">
						@if($burger->image)
						<img style="width:200px;height:200px" src="{{asset('uploads/'.$burger->image)}}" alt=""/>
                           @endif
					</a>
					<div class="caption">
					  <h5>{{$burger->name}}</h5>
					  <p> 
						{{$burger->ProductDetail->total_item ?? ''}}
					  </p>
					 
					  <h4 style="text-align:center"> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">RS {{$burger->price ?? 'NILL'}}</a></h4>


					</div>
				  </div>
				</li>
				@endforeach
			  </ul>	
</div>
@endsection