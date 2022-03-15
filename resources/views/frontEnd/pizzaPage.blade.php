@extends('frontEnd.masterFile.master')

@section('title')
Pizza Page
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/customCSS.css')}}">
@endsection

@section('content')
<div class="span9">
<ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Pizza</li>
    </ul>
<h4>PIZZA PAGE</h4>
			  <ul class="thumbnails">
			  	@foreach($pizza as $pizzaa)
				<li class="span3">
				  <div class="thumbnail">
					<a  href="product_details.html">
						@if($pizzaa->image)
						<img style="width:200px;height:200px" src="{{asset('uploads/'.$pizzaa->image)}}" alt=""/>
                           @endif
					</a>
					<div class="caption">
					  <h5>{{$pizzaa->name ?? ''}}</h5>
					  <p> 
						
					  </p>
					 
					  <h4 style="text-align:center"> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">RS {{$pizzaa->price ?? 'NILL'}}</a></h4>
					</div>
				  </div>
				</li>
				@endforeach
			  </ul>	
</div>




@endsection