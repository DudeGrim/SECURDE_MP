<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use Auth;
use App\Product;
use App\Product_Stock;
use App\Review;
use App\Transaction;
use Gloudemans\Shoppingcart\ShoppingcartServiceProvider;
use Cart;

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
    /*Cart Functions*/
    public function addToCart(Request $request){
      //Cart::destroy();

      $product_stock = Product_Stock::with('product')
                      ->where('idProduct', $request->idProduct)
                      ->where('size', $request->size)->first();

      Cart::add([
        'id' => $product_stock->idProductStock,
        'name' => $product_stock->product->name,
        'qty'=> '1',
        'options' => ['product' => $product_stock->product->idProduct,
                      'product_stock'=>$product_stock->idProductStock,
                      'size' => $product_stock->size],
        'price' => $product_stock->product->price]);

      return back();
    }
    public function removeFromCart(Request $request){
      Cart::remove($request->rowID);
      return back();
    }
    public function recalculateCart(Request $request){
      echo "before".Cart::count()."\n";
      foreach(Cart::content() as $item){
          $qtyName = "qty_".$item->rowId;
          Cart::update($item->rowId, $request->$qtyName);
      }
      echo "after".Cart::count();
      //return back();
    }
    public function buyCart(Request $request){
      foreach(Cart::content() as $item){

          $transaction = new Transaction;

          $transaction->idCustomer = Auth::user()->idAccount;
          $transaction->idProduct = $item->options->product;
          $transaction->quantity = $item->qty;
          $transaction->price = $item->price;

          $product_stock = new Product_Stock;
          $product_stock = Product_Stock::find($item->options->product_stock);

          $product_stock->decrement('stock',1);

          $transaction->save();
      }
      Cart::destroy();

      $products = Product::all();
      return Response::view('customer/catalog', compact('products'));
    }

}
