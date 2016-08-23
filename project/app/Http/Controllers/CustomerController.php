<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use Auth;
use App\Product;
use App\Review;
use App\Transaction;

class CustomerController extends Controller
{
    public function __construct(){

      $this->middleware('customer');
    }
    public function showCatalog(){
      $products = Product::all();
      return Response::view('customer/catalog', compact('products'));
    }
    public function checkout(){
      return Response::view('customer/cart');
    }
    public function addNewReview(Request $request){

            $review = new Review;
            $review->idCustomer = Auth::user()->idAccount;
            $review->idProduct = $request->_idProduct;
            $review->review = $request->_review;
            $review->rating = $request->_rating;

            $review->save();

            return back();
    }
    public function viewTransaction(){
      $transactions = Transaction::with('productSold')
                      ->where('idCustomer', Auth::user()->idAccount)
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
