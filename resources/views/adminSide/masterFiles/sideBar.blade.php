 <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{route('adminDashboard')}}"><i class="fa fa-home"></i> Dashboard </a>
                   </li>

 <li><a href="{{route('userData')}}"><i class="fa fa-home"></i> User Manager </a>
                   
                  </li>




                  <li><a><i class="fa fa-edit"></i> Category <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('category.create')}}">Add Category</a></li>
                      <li><a href="{{route('viewCategory')}}">View Category</a></li>
                     </li>
</ul>

 








 <li><a><i class="fa fa-edit"></i> Products <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('productsCreate')}}">Add Products</a></li>
                      <li><a href="{{route('productsView')}}">View Products</a></li>
                     </li>
</ul>




<li><a><i class="fa fa-edit"></i> Cart Data<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('productBooks')}}">View Products</a></li>
                      
                     </li>
</ul>


 
              </div>


             

            </div>
            <!-- /sidebar menu -->