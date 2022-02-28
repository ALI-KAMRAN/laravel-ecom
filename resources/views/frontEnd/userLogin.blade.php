@extends('frontEnd.masterFile.master')

@section('title')
User Login
@endsection

@section('content')

<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Login</li>
    </ul>
	<h3> Login</h3>	
	<hr class="soft"/>



<div class="row">
		
		<div class="span1"> </div>
		<div class="span4">
			<div class="well">
			<h5>User Login</h5>
			<form method="POST" action="{{route('userCheck')}}" >
				@csrf
				@if ($errors->any())
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					<li>{{ $error}}</li>
					@endforeach
				</div>
				@endif
			  <div class="control-group">
				<label class="control-label" for="inputEmail1">Email</label>
				<div class="controls">
				  <input class="span3" name="email" type="text" id="inputEmail1" placeholder="Email">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword1">Password</label>
				<div class="controls">
				  <input type="password" class="span3" name="password"  id="inputPassword1" placeholder="Password">
				</div>
			  </div>
			  <div class="control-group">
				<div class="controls">
				  <button type="submit" class="btn">Sign in</button> <a href="{{route('userRegister')}}">&nbsp; Register </a>

				</div>
			  </div>
			</form>
		</div>
		</div>
	</div>	


</div>

@endsection