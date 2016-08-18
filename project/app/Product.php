<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
     use SoftDeletes;

     protected $table = 'products';
     protected $primaryKey = 'idProduct';
     /*for soft deletes*/
     protected $dates = ['deleted_at'];

     protected $guarded = ['idProduct'];

     public function bought(){
       return $this->belongsToMany(Transaction::class, 'idProduct', 'idProduct');
     }

     public function reviews(){
        return $this->hasMany(Review::class, 'idProduct', 'idProduct');
     }

     public function stocks(){
        return $this->hasMany(Product_Stock::class, 'idProduct', 'idProduct');
     }

     public function addNewProduct(Product_Stock $stock){
        return $this->stocks()->save($stock);
     }
     /*
     public function reviewData(){
       $reviewData = DB::table('reviews')
                       ->select(DB::raw('count(*) as reviewCount, average(rating) as ratingAve'))
                       ->where('idProduct', $this->idProduct)
                       ->groupBy('idProduct')
                       ->get();
        //return $reviewData;
     }*/
}
