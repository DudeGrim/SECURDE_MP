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

      $this->call('transaction_table_seeder');
      $this->command->info('Transactions table seeded!');

      $this->call('customer_table_seeder');
      $this->command->info('Customers table seeded!');

      $this->call('review_table_seeder');
      $this->command->info('Review table seeded!');

      $this->call('account_table_seeder');
      $this->command->info('Account table seeded!');

    }
}
