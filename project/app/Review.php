<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
     use SoftDeletes;

     protected $table = 'reviews';
     protected $primaryKey = 'idReview';
     /*for soft deletes*/
     protected $dates = ['deleted_at'];

     //protected $guarded = ['idProduct'];

     /*Customer Wrote a Review*/
     public function writer(){
       return $this->belongsTo(Customer::class, 'idCustomer', 'idCustomer');
     }
     /*Product bought*/
     public function productReviewed(){
        return $this->belongsTo(Product::class, 'idProduct', 'idProduct');
     }
}
