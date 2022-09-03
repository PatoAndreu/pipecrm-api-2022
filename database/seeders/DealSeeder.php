<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Deal;

class DealSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Deal::factory()
      ->count(100)
      ->create();
  }
}
