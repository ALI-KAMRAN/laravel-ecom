@extends('adminSide.masterFiles.master')

@section('title')
Add Extra Product Details
@endsection

@section('content')

<div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Admin Dashboard</h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Add Products <small>Admin add Products</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <br>
           
<br>
<div class="ln_solid"></div>

<form class="form-horizontal form-label-left" action="{{route('productDetailStore',$id)}}" method="post" enctype="multipart/form-data">
	
@csrf

   <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Title <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                      <input value="{{@$product->productDetail->title}}" type="text" name="title" class="form-control col-md- 12 col-xs-12" required="">
                      </div>
                    </div>


                     <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Total Items <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                      <input value="{{@$product->productDetail->total_item}}" type="number" name="total_item" class="form-control col-md- 12 col-xs-12" required="">
                      </div>
                    </div>

                     <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Total Items <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                     <textarea  name="description" class="form-control col-md-7 col-xs-12" rows="05" col="50" required="">{{@$product->productDetail->description}}</textarea>
                      </div>
                    </div>

            
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>



</form>


                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
