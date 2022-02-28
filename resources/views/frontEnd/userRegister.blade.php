@extends('frontEnd.masterFile.master')

@section('title')
User Register
@endsection

@section('content')

<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Register</li>
    </ul>
	<h3> Registration</h3>	
	<div class="well">
	<hr class="soft"/>


<form class="form-horizontal" action="{{route('userDataStore')}}" method="get">
	@csrf
		<h4>Your personal information</h4>
	
		<div class="control-group">
			<label class="control-label" for="inputFname1">First name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="first_name" id="inputFname1" placeholder="First Name">
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLnam">Last name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="last_name" id="inputLnam" placeholder="Last Name">
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="input_email">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" id="input_email" name="email" placeholder="Email">
		</div>
	  </div>	  
	<div class="control-group">
		<label class="control-label" for="inputPassword1">Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" id="inputPassword1" name="password" placeholder="Password">
		</div>
	  </div>	  
		

<div class="control-group">
			<label class="control-label" for="mobile">Mobile Phone </label>
			<div class="controls">
			  <input type="number"  name="mobile" id="mobile" placeholder="Mobile Phone"/> 
			</div>
		</div>


		<div class="control-group">
			<label class="control-label" for="mobile">Address </label>
			<div class="controls">
			  <input type="text"  name="address" id="mobile" placeholder="Home Address"/> 
			</div>
		</div>


<div class="control-group">
			<div class="controls">
				<input type="hidden" name="email_create" value="1">
				<input type="hidden" name="is_new_customer" value="1">
				<input class="btn btn-large btn-success" type="submit" value="Register" />
			</div>
		</div>	

</form>


</div>

@endsection