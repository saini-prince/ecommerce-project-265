<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(){
        $all_categories=Category::with('rProducts')->orderBy('id','asc')->get();
        $all_products=Product::with('rCategory')->orderBy('id','asc')->get();
        return view('front.home',compact('all_products','all_categories'));
    }

    public function all_products_categorywise($id){
        $all_categories=Category::where('id',$id)->with('rProducts')->first();
        return view('front.all_products_categorywise',compact('all_categories'));
    }

    public function single_product($id){
        $product_single=Product::where('id',$id)->first();
        return view('front.single_product',compact('product_single'));
    }

}