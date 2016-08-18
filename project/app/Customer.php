<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $table = 'customers';
  protected $primaryKey = 'idCustomer';


  public function accountDetails(){
    return $this->hasOne(Account::class, 'idAccount', 'idAccount');
  }
  
  public function transactions(){
     return $this->hasMany(Transaction::class, 'idCustomer', 'idCustomer');
  }

  public function reviews(){
     return $this->hasMany(Review::class, 'idCustomer', 'idCustomer');
  }


}
