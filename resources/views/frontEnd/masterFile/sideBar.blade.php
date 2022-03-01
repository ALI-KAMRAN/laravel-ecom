<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="{{route('cart')}}"><img src="{{asset('themes/images/ico-cart.png')}}" alt="cart">View Your Cart  <a href="{{route('cart')}}"></a></a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open"><a> PIZZA</a>
				<ul>
				<li><a class="active" href="products.html"><i class="icon-chevron-right"></i>Fajita Pizza </a></li>
				<li><a href="products.html"><i class="icon-chevron-right"></i>Chicken Tikka Pizza</a></li>
				<li><a href="products.html"><i class="icon-chevron-right"></i>Creami Pizza</a></li>
				<li><a href="products.html"><i class="icon-chevron-right"></i>Spicy Pizza</a></li>
				</ul>
			</li>
			<li class="subMenu"><a> Burger</a>
			<ul style="display:none">
				<li><a href="products.html"><i class="icon-chevron-right"></i>Fillet Burger</a></li>
				<li><a href="products.html"><i class="icon-chevron-right"></i>Shami Burger</a></li>												
				<li><a href="products.html"><i class="icon-chevron-right"></i>Pattery Burger</a></li>	
				<li><a href="products.html"><i class="icon-chevron-right"></i> Tower Burger</a></li>
																
			</ul>
			</li>
			
			<li><a href="products.html">Other Foods</a></li>
			
		</ul>
		<br/>
		  <div class="thumbnail">
			<img src="{{asset('images/010320221646145071.gif')}}" alt="Bootshop panasonoc New camera"/>
			<div class="caption">
			  <h5>PIZZA</h5>
				<h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">400</a></h4>
			</div>
		  </div><br/>
			<div class="thumbnail">
				<img src="{{asset('images/010320221646145124.JPG')}}" title="Bootshop New Kindel" alt="Bootshop Kindel">
				<div class="caption">
				  <h5>BURGER</h5>
				    <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">500</a></h4>
				</div>
			  </div><br/>
			<div class="thumbnail">
				<img src="{{asset('themes/images/payment_methods.png')}}" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->