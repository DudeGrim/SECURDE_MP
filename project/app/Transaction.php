<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
     protected $table = 'transactions';
     protected $primaryKey = 'idTransaction';

     public function productSold(){
        return $this->hasOne(Product::class, 'idProduct', 'idProduct');
     }
     public function buyer(){
        return $this->belongsTo(Customer::class, 'idCustomer');
     }
}
