<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;


use App\Account;

class AdminController extends Controller
{

  public function adminLandingPage(){
    $admins = Account::where('accountType', '>', '1')->get();

    return Response::view('admin_manager/admin_landing', compact('admins'));
  }
  public function createNewAdmin(Request $request){

    //dd('hit');
    $account = new Account;

    $account->username = $request->_category;
    $account->firstName = $request->_firstname;
    $account->middleInitial  = $request->_middleinitial;
    $account->lastName = $request->_lastname;
    $account->emailAddress = $request->_emailaddress;
    $account->username = $request->_username;
    $account->password =  bcrypt($request->_password);
    $account->accountType = $request->_adminrole;

    $account->save();

    return back();
  }
}
