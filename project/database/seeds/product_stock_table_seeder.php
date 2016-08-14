<?php

use Illuminate\Database\Seeder;
use App\Product_Stock;

class product_stock_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('product_stock')->delete();
      foreach (range(1, 20, 1) as $productID) {
        foreach (range(5, 11, 1) as $size) {
          $stock =  rand(0, 10);
          Product_Stock::create(array(
            'idProduct' => $productID,
            'size' => $size,
            'stock' => $stock
          ));
        }
      }
    }
}
