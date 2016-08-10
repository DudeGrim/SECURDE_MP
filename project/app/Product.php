<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $table = 'products';
     protected $primaryKey = 'idProduct';

     public function stocks(){
        return $this->hasMany(Product_Stock::class, 'idProduct');
     }
}
