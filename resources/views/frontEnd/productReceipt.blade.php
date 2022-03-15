<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Receipt</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
	
	body {
    background-color: #000
}

.padding {
    padding: 2rem !important
}

.card {
    margin-bottom: 30px;
    border: none;
    -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #e6e6f2
}

h3 {
    font-size: 20px
}

h5 {
    font-size: 15px;
    line-height: 26px;
    color: #3d405c;
    margin: 0px 0px 15px 0px;
    font-family: 'Circular Std Medium'
}

.text-dark {
    color: #3d405c !important
}
</style>


</head>
<body>



<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
     <div class="card">
         <div class="card-header p-4">
             
             <div class="float-right">
                 <h3 class="mb-0">Invoice #BBB{{ Auth::user()->id ?? ''}}</h3>
                 {{  now()->toDayDateTimeString() }}





             </div>
         </div>
         <div class="card-body">
<div class="row mb-4">
                 <div class="col-sm-6">
                     <h5 class="mb-3">From:</h5>
                     <h3 class="text-dark mb-1">Bilal Pizza Shop</h3>
                     <div>29, Main Chowk</div>
                     <div>Shekupura,Punjab Pakistan</div>
                     <div>Email: contact@bbbootstrap.com</div>
                     <div>Phone: +92 9897 989 989</div>
                 </div>
      
                 <div class="col-sm-6 ">
                    
                <h5 class="mb-3">To:</h5>
                     <h3 class="text-dark mb-1">{{ Auth::user()->name ?? ''}}</h3>
                     <div>Emial: {{ Auth::user()->email ?? ''}}</div>
                     <div>Phone: {{ Auth::user()->phone ?? ''}}</div>
                  <div>Address: {{ Auth::user()->address ?? ''}}</div>
                 
                 </div>
             </div>
             <div class="table-responsive-sm">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th class="center">#</th>
                             <th>Item</th>
                             
                             <th class="right">Price</th>
                             <th class="center">Qty</th>
                             <th class="right">Total</th>
                         </tr>
  </thead>

  
                     <tbody>
                     	@php $sum = 0;
                        $discountRate = 0;
                        $paymentTotal = 0;
                         @endphp
                        @foreach($cartData as $key=>$cartData)
                     	@php $totalAmount = $sum + $cartData->product->price * $cartData->qty; @endphp
                     	@php $sum =  $cartData->product->price * $cartData->qty; @endphp
                        @php $discountRate =  ($cartData->product->price * $cartData->qty) / 100 * 20 ; @endphp
                        @php $paymentTotal =   $totalAmount - $discountRate ; @endphp
                         <tr>
                            
                             <td class="center">{{$key+1}}</td>
                             <td class="left strong">{{$cartData->product->name}}</td>
                            <td class="right">{{$cartData->product->price}}</td>
                             <td class="center">{{$cartData->qty}}</td>
                             <td class="right">{{$sum}}</td>
                      
                         </tr>
                         @endforeach
                        
                         
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-lg-4 col-sm-5">
                 </div>
                 <div class="col-lg-4 col-sm-5 ml-auto">
                     <table class="table table-clear">
                         <tbody>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">Subtotal</strong>
                                 </td>
                                 <td class="right">{{$totalAmount ?? 'Null'}}</td>
     </tr>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">Discount (20%)</strong>
                                 </td>
                                 <td class="right">{{$discountRate}}</td>
                             </tr>
                             
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">Total</strong> </td>
                                 <td class="right">
                                     <strong class="text-dark">{{$paymentTotal}}</strong>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
         <div class="card-footer bg-white">
             <p class="mb-0">Thanks for Shoping!</p>
         </div>
     </div>
 </div>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>