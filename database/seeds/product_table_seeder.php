<?php

use Illuminate\Database\Seeder;
use App\Product;

class product_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('products')->delete();
      $json = File::get("database/data/productData.json");
      $data = json_decode($json);
      foreach ($data as $obj) {
        Product::create(array(
          'category' => $obj->category,
          'name' => $obj->name,
          'description' => $obj->description,
          'price' => $obj->price
        ));
      }
    }
}
