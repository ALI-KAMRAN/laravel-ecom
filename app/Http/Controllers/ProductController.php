<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\productDetails;
use Illuminate\Http\Request;
use App\Models\category;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::get();
        return view('products.viewProducts',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::where('status','1')->get();
        return view('products.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {                                                  
        $data = array(
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,

        );
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = date('dmY').time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("/uploads"), $fileName);
            $data["image"] = $fileName;
        }
        $create = product::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product,Request $request)
    {
        $id = $request->id;
        $product = product::findOrFail($id);
        $category = category::where('status','1')->get();
        return view('products.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $id = $request->id;
        $data = array(
          'name' => $request->name,
          'category_id' => $request->category_id,
          'price' => $request->price,

        );
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = date('dmY').time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("/uploads"), $fileName);
            $data["image"] = $fileName;
        }
        $create = product::where('id',$id)->update($data);
        return redirect()->route('productsView');


            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,Request $request)
    {
        $id = $request->id;
        $product = produce::find($id);
        $product->delete();
        return response()->json('success');
    }

    public function productDetail(Request $request){

      $id = $request->id;
      $product = product::where('id',$id)->with('ProductDetail')->first();
      return view('products.productExtraDetails',compact('id','product'));
    }

    public function productDetailStore(Request $request){
      $id = $request->id;
      $data = array(
  'title' => $request->title,
  'product_id' => $id,
  'total_item' => $request->total_item,
  'description' => $request->description,

      );
      $details = productDetails::updateOrCreate(

['product_id' => $id],
$data
      );
      return redirect()->route('productsView');


    }



}
