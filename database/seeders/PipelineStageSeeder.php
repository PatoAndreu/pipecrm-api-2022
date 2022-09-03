<?php

namespace Database\Seeders;

use App\Models\PipelineStage;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PipelineStageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    PipelineStage::insert([
      [
        "name" => "Cita programada",
        "pipeline_id" => 1,
        "probability_of_close" => 20,
        'created_at' => Carbon::now(),
      ],
      [
        "name" => "Calificado para la compra",
        "pipeline_id" => 1,
        "probability_of_close" => 40,
        'created_at' => Carbon::now(),
      ],
      [
        "name" => "Presentación programada",
        "pipeline_id" => 1,
        "probability_of_close" => 60,
        'created_at' => Carbon::now(),
      ],
      [
        "name" => "Tomador de decisiones traído",
        "pipeline_id" => 1,
        "probability_of_close" => 80,
        'created_at' => Carbon::now(),
      ],
      [
        "name" => "Contrato enviado",
        "pipeline_id" => 1,
        "probability_of_close" => 90,
        'created_at' => Carbon::now(),
      ],
      [
        "name" => "Cierres ganados",
        "pipeline_id" => 1,
        "probability_of_close" => "won",
        'created_at' => Carbon::now(),
      ],
      [
        "name" => "Cierres perdidos",
        "pipeline_id" => 1,
        "probability_of_close" => "lost",
        'created_at' => Carbon::now(),
      ],
    ]);
  }
}
