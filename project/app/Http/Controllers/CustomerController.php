<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;

use App\Product;

class CustomerController extends Controller
{
    public function showCatalog(){
      $products = Product::all();
      return Response::view('customer/catalog', compact('products'));
    }

}
