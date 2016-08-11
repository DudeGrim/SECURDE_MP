<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;

//for step 1: use DB;

use App\Product;
use App\Product_Stock;
class ProductController extends Controller
{

    public function viewAll(){
      //for step 1:  $products = \DB::table('product')->get();
      $products = Product::all();
      return Response::view('product_manager/view_all_products', compact('products'))
            ->header('X-Frame-Options','DENY');
    }
    public function showOne(Product $product){
      return view('product_manager/edit_product', compact('product'));
    }

    public function addNewProduct(Request $request){

      $product = new Product;

      $product->category = $request->_category;
      $product->name = $request->_name;
      $product->description = $request->_description;
      $product->price = $request->_price;

      $product->save();

      foreach(range(5,11) as $size){

        $stock = new Product_Stock;
        $sizeName = "size_".$size;

        $stock->size = $size;
        $stock->stock = $request->$sizeName;

        //$product->stocks()->save($stock);
        $product->addNewProduct($stock);
      }

      return back();
    }
}
