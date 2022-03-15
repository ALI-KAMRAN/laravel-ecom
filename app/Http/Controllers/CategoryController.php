<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::where('status','1')->get();
        return view('adminSide.category.view',compact('categories'));
    }

     // all pizza disply on pizza page
     public function pizzaPage(){
        $pizza = category::where('name','LIKE',"%pizza%")->get();
        
        return view('frontEnd.pizzaPage',compact('pizza'));
     } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::whereNull('category_id')->get();
        return view('adminSide.category.add',compact('categories'));
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
             'price' => $request->price,
             'category_id' => $request->category_id

        );
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = date('dmY').time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("/uploads"), $fileName);
            $data["image"] = $fileName;
        }
       $create = category::create($data);
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,category $category)
    {
        $id = $request->id;
        $categories = category::whereNull('category_id')->get();
        $category = category::find($id);
        return view('adminSide.category.edit',compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,category $category)
    {
        $id = $request->id;
        $data = array(
             
             'name' => $request->name,
             'category_id' => $request->category_id

        );
       $category = category::find($id);
       $category->update($data);
       return redirect()->route('viewCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,category $category)
    {
      
          $id = $request->id;
        $category_delete = category::find($id);
        $category_delete->delete();
      
    }
}
