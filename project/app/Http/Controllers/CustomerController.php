<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;

use App\Product;
use App\Review;
use App\Transaction;

class CustomerController extends Controller
{
    public function showCatalog(){
      $products = Product::all();
      return Response::view('customer/catalog', compact('products'));
    }
    public function checkout(){
      return Response::view('customer/cart');
    }
    public function viewTransaction(){
      $transactions = Transaction::with('productSold')
                      ->where('idCustomer', 1)
                      ->orderBy('created_at', 'asc')
                      ->get();
      //return $transactions;
      return Response::view('customer/transaction', compact('transactions'))
                ->header('X-Frame-Options','DENY');
    }
    public function writeReview(Product $product){
      $reviews = Review::where('idProduct',  $product->idProduct)->get();
      return view('customer/review', compact('product','reviews'));
    }

}
