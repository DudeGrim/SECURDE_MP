<?php

use Illuminate\Database\Seeder;
use App\Customer;
class customer_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('customers')->delete();
      foreach (range(1, 5, 1) as $id) {
          Customer::create(array(
            'idCustomer' => $id,
            'idAccount' => $id,
            'idBilling' => $id,
            'idShipping' => $id
          ));
        }
    }
}
