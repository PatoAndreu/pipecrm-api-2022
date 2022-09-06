<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pipeline;
use Carbon\Carbon;

class PipelineSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Pipeline::create([
      "name" => "Sales Pipeline",
      "order" => 0,
      'created_at' => Carbon::now(),
    ]);
  }
}
