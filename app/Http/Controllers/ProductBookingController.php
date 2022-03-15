<?php

namespace App\Http\Controllers;

use App\Models\productBooking;
use Illuminate\Http\Request;
use App\Models\Cart;
use Session;
use Omnipay\Omnipay;

class ProductBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking_products = productBooking::get();
        return view('products.productBooks',compact('booking_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart_id = $request->cart_id;
        $data = array();
        $amount = 0;
        foreach ($cart_id as $i=>$value){
            $cart = cart::find($value);
            $amount = $amount + $cart->product->price;
            $data[$i]['user_id'] = $cart->user_id;
            $data[$i]['product_id'] = $cart->product_id;
            $data[$i]['qty'] = $cart->qty;
            $data[$i]['payment_status'] = '0';
        }
        $productBooking = productBooking::insert($data);
        $bookIds = productBooking::orderBy('id','desc')->take(count($data))->
        pluck('id');


        if($productBooking){
            Cart::destroy($cart_id);

       if($request->payment_type == 'eway'){
        Session::put('bookIds', $bookIds);
        $url = $this->ewayPayment($amount);
        return response()->json(['type' =>'eway','url'=>$url]);

       }else{

        return response()->json(['type' =>'pay_person']);

       }


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productBooking  $productBooking
     * @return \Illuminate\Http\Response
     */
    public function show(productBooking $productBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productBooking  $productBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(productBooking $productBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productBooking  $productBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productBooking $productBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productBooking  $productBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(productBooking $productBooking,Request $request)
    {
        $id = $request->id;
        $bookedProduct = productBooking::find($id);
        $bookedProduct->delete();
    }


public function change_booking_status(Request $request){

         $id = $request->id;
         $booking_status = $request->booking_status;
         $booking_product = productBooking::where('id',$id)->update([
           'booking_status' => $booking_status
            ]);
}


   public function ewayPayment($amount){

     $total_amount = $amount;
     $apiKey = 'A1001CZrrGIZyKcH6SaLK1tLTBoDPqsY3aMIL1jUkTio1m8ZNl9Dkzv4oezRMXdMw4UCQM';
     $apiPassword = '******';
     $apiEndpoint = 'Sandbox';
     $client = \Eway\Rapid::createClient($apiKey,$apiPassword,$apiEndpoint);
   
   // transaction detail

     $transaction = [
     'RedirectUrl' => route('bookingProductSuccess'),
     'CancelUrl' => route('bookingProductFail'),
     'TransactionType' => \Eway\Rapid\Enum\TransactionType::PURCHASE,
     'Payment' => [
         'TotalAmount' => $total_amount,
    
     ],

     ];

       // submit data to eway to get a shared page URL
      $response = $client->createTransaction(\Eway\Rapid\Enum\ApiMethod::
        RESPONSIVE_SHARED, $transaction);

      // check for any errors
      $sharedURL = '';
      if(!$response->getErrors()){
        $sharedURL =  $response->SharedPaymentUrl;
      }
      return $sharedURL;



   }

   public function bookingFail(){

   Session::forget('bookIds');
   return redirect()->route('cart');

   }

   public function bookingSuccess(){
     $bookIds = Session::get('bookIds');
     productBooking::whereIn('id', $bookIds)->update(['payment_status' => '1']);
     Session::forget('bookIds');
     return redirect()->route('cart');

   }


}
