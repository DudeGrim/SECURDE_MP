<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
  protected $table = 'accounts';
  protected $primaryKey = 'idAccount';

  public function customer(){
     return $this->belongsTo(Customer::class, 'idAccount', 'idAccount');
  }
}
