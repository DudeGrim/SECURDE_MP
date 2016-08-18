<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_Stock extends Model
{
    use SoftDeletes;

    protected $table = 'product_stock';
    protected $primaryKey = 'idProductStock';
    /*for soft deletes*/
    protected $dates = ['deleted_at'];

    public function product(){
       return $this->belongsTo(Product::class, 'idProduct');
    }
}
