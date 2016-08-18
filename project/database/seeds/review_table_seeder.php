<?php

use Illuminate\Database\Seeder;
use App\Review;

class review_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('reviews')->delete();
      $json = File::get("database/data/reviewData.json");
      $data = json_decode($json);
      foreach ($data as $obj) {
        Review::create(array(
          'idCustomer' => $obj->idCustomer,
          'idProduct' => $obj->idProduct,
          'review' => $obj->review,
          'rating' => $obj->rating
        ));
      }
    }
}
