<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Stock extends Model
{
    protected $table = 'product_stock';
    protected $primaryKey = 'idProductStock';

    public function product(){
       return $this->belongsTo(Product::class, 'idProduct');
    }
}
