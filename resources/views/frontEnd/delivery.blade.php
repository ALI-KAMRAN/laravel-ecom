@extends('frontEnd.masterFile.master')

@section('title')
Delivery
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/customCSS.css')}}">
@endsection

@section('content')
<div class="span9" id="mainCol">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Page Title</li>
    </ul>
	<h3> Title of the page</h3>	
	<hr class="soft"/>
	<h2 style="text-align:center">Product Card</h2>
	

<div class="container-fluid">
<div class="card">
  <img src="/w3images/jeans3.jpg" alt="Denim Jeans" style="width:100%">
  <h1>Tailored Jeans</h1>
  <p class="price">$19.99</p>
  <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
  <p><button>Add to Cart</button></p>
</div>

</div>

@endsection