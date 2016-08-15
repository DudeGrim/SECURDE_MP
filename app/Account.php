<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
  protected $table = 'accounts';
  protected $primaryKey = 'idAccount';

  public function customer(){
     return $this->belongsTo(Customer::class, 'idAccount', 'idAccount');
  }
}
