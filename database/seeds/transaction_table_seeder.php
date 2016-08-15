<?php

use Illuminate\Database\Seeder;
use App\Transaction;

class transaction_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('transactions')->delete();
      for ($x = 0; $x <= 20; $x++) {
        $idCustomer = mt_rand (1,5);
        $idProduct = mt_rand (1,20);
        $idQuantity = mt_rand(1,5);
        $price = 1000 + mt_rand() / mt_getrandmax() * (2000 - 1000);
          Transaction::create(array(
            'idCustomer' => $idCustomer,
            'idProduct' => $idProduct,
            'quantity' => $idQuantity,
            'price' => $price
          ));
        }

    }
}
