<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      'first_name' => 'Patricio',
      'last_name' => 'Andreu',
      'email' => 'patricioandreu@gmail.com',
      'password' => bcrypt('1810'),
      'phone_number' => "56222222222",
      'mobile_phone_number' => "56984446080",
    ]);

    User::factory(10)->create();
  }
}
