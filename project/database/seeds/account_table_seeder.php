<?php

use Illuminate\Database\Seeder;
use App\Account;
class account_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('accounts')->delete();
      $json = File::get("database/data/userData.json");
      $data = json_decode($json);
      foreach ($data as $obj) {
        Account::create(array(
          'accountType' => $obj->accountType,
          'username' => $obj->username,
          'password' => bcrypt($obj->password),
          'emailAddress' => $obj->emailAddress,
          'firstName' => $obj->firstName,
          'middleInitial' => $obj->middleInitial,
          'lastName' => $obj->lastName
        ));
      }
    }
}
