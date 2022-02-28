<?php

namespace App\Http\Controllers;

use App\Models\productBooking;
use Illuminate\Http\Request;
use App\Models\Cart;

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
        foreach ($cart_id as $i=>$value){
            $cart = cart::find($value);
            $data[$i]['user_id'] = $cart->user_id;
            $data[$i]['product_id'] = $cart->product_id;
            $data[$i]['qty'] = $cart->qty;
            $data[$i]['payment_status'] = '0';
        }
        $productBooking = productBooking::insert($data);
        if($productBooking){
            Cart::destroy($cart_id);
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



}
