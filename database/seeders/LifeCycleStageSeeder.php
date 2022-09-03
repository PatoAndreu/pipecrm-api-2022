<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LifeCycleStage;
use Carbon\Carbon;

class LifeCycleStageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    LifeCycleStage::insert(
      [
        [
          "name" => "Suscriptor",
          'created_at' => Carbon::now(),
        ],
        [
          "name" => "Lead",
          'created_at' => Carbon::now(),
        ],
        [
          "name" => "Lead calificado por marketing",
          'created_at' => Carbon::now(),
        ],
        [
          "name" => "Lead calificado por ventas",
          'created_at' => Carbon::now(),
        ],
        [
          "name" => "Oportunidad",
          'created_at' => Carbon::now(),
        ],
        [
          "name" => "Cliente",
          'created_at' => Carbon::now(),
        ],
        [
          "name" => "Evangelizador",
          'created_at' => Carbon::now(),
        ],
        [
          "name" => "Otra",
          'created_at' => Carbon::now(),
        ],
      ]
    );
  }
}
