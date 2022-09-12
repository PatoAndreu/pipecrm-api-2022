<?php

namespace Database\Seeders;

use App\Models\ContactLifeCycleStage;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ContactLifeCycleStageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ContactLifeCycleStage::insert(
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
