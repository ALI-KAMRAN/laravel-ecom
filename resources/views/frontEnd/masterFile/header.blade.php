<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong> User</strong></div>
	<div class="span6">
	<div class="pull-right">
		<a href="{{route('cart')}}"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] Itemes in your cart </span> </a> 
	</div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="{{route('homePage')}}"></a>
		
		<input id="srchFld" class="srchTxt" type="text" />
		  
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    
    <ul id="topMenu" class="nav pull-right">
    	 <li class=""><a href="{{route('homePage')}}">Home Page</a></li>
	 <li class=""><a href="{{route('allItems')}}">All Items</a></li>
	 <li class=""><a href="{{route('pizzaPage')}}">Pizza</a></li>
	 <li class=""><a href="{{route('burgerPage')}}">Burger</a></li>
	 <li class=""><a href="{{route('contact')}}">Contact</a></li>
	 <li class=""><a href="{{route('cart')}}">View Cart</a></li>
	 <li class="">
	 	@if(Auth::user())
	 <a href="{{route('userLogout')}}"><span class="btn btn-large btn-success">Log Out</span></a>
	 @else
<a href="{{route('userLogin')}}"><span class="btn btn-large btn-success">Login</span></a>
	 @endif
	
	</li>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->