<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
  protected $table = 'accounts';
  protected $primaryKey = 'idAccount';
  protected $fillable = [
      'username',
      'emailAddress',
      'firstName',
      'middleInitial',
      'lastName',

  ];
  protected $hidden = [
      'password',
      'accountType'


  ];

  public function customer(){
     return $this->belongsTo(Customer::class, 'idAccount', 'idAccount');
  }
}
