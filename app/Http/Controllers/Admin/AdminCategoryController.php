<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AdminCategoryController extends Controller
{
    public function show(){
        $categories=Category::orderBy('id','asc')->get();
        return view('admin.category_show',compact('categories'));
    }
    
    
    public function create(){
        return view('admin.category_create');
    }


    public function store(Request $request){
        $request->validate([
            'category_name'=>'required|regex:/^[a-zA-Z]+[a-zA-Z]/',
            'category_status'=>'required'
        ]);
        $category=new Category();
        $category->category_name=$request->category_name;
        $category->category_status=$request->category_status;
        $category->save();

        return redirect()->route('admin_category_show')->with('success','Category is added successfully');
    }


    public function edit($id){
        $category_single=Category::where('id',$id)->first();
        return view('admin.category_edit',compact('category_single'));
    }


    public function update(Request $request,$id){
        $request->validate([
            'category_name'=>'required|regex:/^[a-zA-Z]+[a-zA-Z]/',
            'category_status'=>'required'
        ]);
        $category=Category::where('id',$id)->first();
        $category->category_name=$request->category_name;
        $category->category_status=$request->category_status;
        $category->update();

        return redirect()->route('admin_category_show')->with('success','Category is updated successfully');
    }


    public function delete($id){
        $category_single=Category::where('id',$id)->first();
        $category_single->delete();

        return redirect()->route('admin_category_show')->with('success','Category is deleted successfully');
    }


    public function single_category($id){

        $category_single=Category::where('id',$id)->first();
        // $all_pds=Category::with('rProducts')->get();
        $all_products=Product::where('category_id',$id)->orderBy('id','asc')->get();

        return view('admin.single_category_detail',compact('category_single','all_products'));
    }
}
