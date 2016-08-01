<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//for step 1: use DB;

use App\Product;
class ProductController extends Controller
{

    public function viewAll(){

      //for step 1:  $products = \DB::table('product')->get();
      $products = Product::all();
      return view('product_manager/view_all_products', compact('products'));
    }
    public function showOne(Product $product){
      return view('product_manager/edit_product', compact('product'));
    }
}
