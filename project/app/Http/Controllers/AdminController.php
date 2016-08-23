<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Account;

class AdminController extends Controller
{

  public function createNewAdmin(Request $request){

    $account = new Account;

    $account->username = $request->_category;
    $account->firstName
    $account->middleInitial
    $account->lastName
    $account->emailAddress
    $account->password
    $account->accountType

    bcrypt($data['password']) 

    $account->save();

    return back();
  }
}
