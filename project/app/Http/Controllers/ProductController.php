<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Requests;

//for step 1: use DB;

use App\Product;
use App\Product_Stock;
use App\Review;
class ProductController extends Controller
{
    public function viewAll(){
      $products = Product::all();
      return Response::view('product_manager/view_all_products', compact('products'))
            ->header('X-Frame-Options','DENY');

    }
    public function showOne(Product $product){
      $reviews = Review::where('idProduct',  $product->idProduct)->get();
      return view('product_manager/edit_product', compact('product','reviews'));
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
    public function addNewReview(Request $request){

            $review = new Review;

            $review->idCustomer = $request->_author;
            $review->idProduct = $request->_idProduct;
            $review->review = $request->_review;
            $review->rating = $request->_rating;
            
            $review->save();

            return back();
    }
    /*Update Product Information*/
    public function updateProduct(Request $request, Product $product){
      $product->update(['category' => $request->_category,
                        'name' => $request->_name,
                        'description' => $request->_description,
                        'price' => $request->_price]);

      foreach(range(5,11) as $size){
        $sizeName = "size_".$size;
        $stock = $product::find($product->idProduct)->stocks()->where('size', $size);

        $stock->update(['stock' => $request->$sizeName]);
      }
      return back();
    }
    /*Delete Product Information*/
    public function deleteProduct(Product $product){
      $product->delete();

      foreach($product->stocks as $stock){
        $stock->delete();
      }
      return back();
    }
}
