<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Hash;
use Illuminate\Support\Facades\Auth;
class frontEndController extends Controller
{
    public function index(){
        $products = product::get();
        $latest_product = product::limit(6)->latest()->get();
        return view('frontEnd.homePage',compact('products','latest_product'));
    }

    public function specialOffer(){

        return view('frontEnd.specialOffer');
    }

    public function delivery(){

        return view('frontEnd.delivery');
    }

    public function contact(){

        return view('frontEnd.contact');
    }

     public function cart(){

      $carts = [];
      if (Auth::user()){
        $user_id = Auth::user()->id;
        $carts = Cart::where('user_id',$user_id)->get();
      }
  
        return view('frontEnd.cart',compact('carts'));
    }

     public function productDetails(Request $request){
        $id = $request->id;
        
        $product = product::where('id',$id)->with('ProductDetail')->first();
        $category_id = $product->category_id;
        $related_products = product::where('category_id',$category_id)->get();
        return view('frontEnd.productDetails',compact('product','related_products'));
    }

    public function userLogin(){
        return view('frontEnd.userLogin');
    }

    public function userCheck(Request $request){
        $data = array(
         'email' => $request->email,
         'password' => $request->password,
);

        if (Auth::attempt($data)){
           return redirect()->route('homePage');
        }else{
            return back()->withErrors(['message'=> 'invalid email or password']);
        }
    }

    public function userRegister(){
        return view('frontEnd.userRegister');
    }

    public function userDataStore(Request $request){
        $data = array(
      'name' => $request->first_name.' '.$request->last_name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => 'user',

        );
        $user = User::create($data);
        return redirect()->route('userLogin');
    }

 public function userLogout(){
        Auth::logout();
        return redirect()->route('userLogin');
    }




}
