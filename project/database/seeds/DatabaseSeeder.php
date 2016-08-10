<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call('product_table_seeder');
      $this->command->info('Products table seeded!');
      $this->call('product_stock_table_seeder');
      $this->command->info('Product Stocks table seeded!');

    }
}
