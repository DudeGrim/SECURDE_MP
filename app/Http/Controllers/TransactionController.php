<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;

use App\Transaction;
use App\Product;
use App\Customer;

class TransactionController extends Controller
{
  public function viewAll(){
    /*
    $transactions = Transaction::with('productSold')->get();
    return $transactions;
    */

    $transactions = Transaction::with('productSold')->get();
    //return $transactions;

    return Response::view('accounting_manager/sales', compact('transactions'))
          ->header('X-Frame-Options','DENY');
          
  }
}
