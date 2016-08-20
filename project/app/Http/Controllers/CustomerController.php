<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;

use App\Product;
use App\Review;

class CustomerController extends Controller
{
    public function showCatalog(){
      $products = Product::all();
      return Response::view('customer/catalog', compact('products'));
    }
    public function checkout(){
      return Response::view('customer/cart');
    }
    public function transaction(){
      return Response::view('customer/transaction');
    }
    public function writeReview(Product $product){
      $reviews = Review::where('idProduct',  $product->idProduct)->get();
      return view('customer/review', compact('product','reviews'));
    }

}
