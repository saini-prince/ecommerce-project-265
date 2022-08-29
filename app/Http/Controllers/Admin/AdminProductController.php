<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class AdminProductController extends Controller
{
    public function show(){
        $all_products=Product::with('rCategory')->orderBy('id','asc')->get();
        return view('admin.products_show',compact('all_products'));
    }


    public function create(){
        $categories=Category::orderBy('id','asc')->get();
        return view('admin.product_create',compact('categories'));
    }


    public function store(Request $request){
        $request->validate([
            'product_name'=>'required|regex:/^[a-zA-Z]+[a-zA-Z]/',
            'product_description'=>'required',
            'product_image'=>'required|image|mimes:jpg,jpeg,png,gif',
            'product_status'=>'required',
            'category_id'=>'required'
        ]);


        $now=time();
        $ext=$request->file('product_image')->extension();
        $final_name='product_image_'.$now.'.'.$ext;
        $request->product_image->move(public_path('uploads/'),$final_name);
    
        $products=new Product();
        $products->product_name=$request->product_name;
        $products->category_id=$request->category_id;
        $products->product_description=$request->product_description;
        $products->product_image=$final_name;
        $products->product_status=$request->product_status;
        $products->save();

        return redirect()->route('admin_product_show')->with('success','Product is added successfully');
    }

    public function edit($id){
        $categories=Category::orderBy('id','asc')->get();
        $product_single=Product::where('id',$id)->first();
        return view('admin.product_edit',compact('product_single','categories'));
    }


    public function update(Request $request,$id){

        $products=Product::where('id',$id)->first();
        $request->validate([
            'product_name'=>'required|regex:/^[a-zA-Z]+[a-zA-Z]/',
            'product_description'=>'required',
            'product_image'=>'required|image|mimes:jpg,jpeg,png,gif',
            'product_status'=>'required',
            'category_id'=>'required'
        ]);
        if($request->hasFile('product_image')){
            $request->validate([
            'product_image'=>'required|image|mimes:jpg,jpeg,png,gif',
        ]);
        $now=time();
        $ext=$request->file('product_image')->extension();
        $final_name='product_image_'.$now.'.'.$ext;
        $request->product_image->move(public_path('uploads/'),$final_name);
        }

        $products->product_name=$request->product_name;
        $products->category_id=$request->category_id;
        $products->product_description=$request->product_description;
        $products->product_image=$final_name;
        $products->product_status=$request->product_status;
        $products->update();

        return redirect()->route('admin_product_show')->with('success','Product is updated successfully');
    }


    public function delete($id){
        $product_single=Product::where('id',$id)->first();
        unlink(public_path('uploads/'.$product_single->product_image));
        $product_single->delete();

        return redirect()->route('admin_product_show')->with('success','Product is deleted successfully');
    }


    public function single_product($id){
        $categories=Category::orderBy('id','asc')->get();
        $product_single=Product::where('id',$id)->first();
        return view('admin.single_product_detail',compact('product_single','categories'));
    }
}
