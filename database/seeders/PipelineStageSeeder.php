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
        "order" => 1,
        'created_at' => Carbon::now(),
      ],
      [
        "name" => "Calificado para la compra",
        "pipeline_id" => 1,
        "probability_of_close" => 40,
        "order" => 2,
        'created_at' => Carbon::now(),
      ],
      [
        "name" => "Presentación programada",
        "pipeline_id" => 1,
        "probability_of_close" => 60,
        "order" => 3,
        'created_at' => Carbon::now(),
      ],
      [
        "name" => "Tomador de decisiones traído",
        "pipeline_id" => 1,
        "probability_of_close" => 80,
        "order" => 4,
        'created_at' => Carbon::now(),
      ],
      [
        "name" => "Contrato enviado",
        "pipeline_id" => 1,
        "probability_of_close" => 90,
        "order" => 5,
        'created_at' => Carbon::now(),
      ],
      [
        "name" => "Cierres ganados",
        "pipeline_id" => 1,
        "probability_of_close" => "won",
        "order" => null,
        'created_at' => Carbon::now(),
      ],
      [
        "name" => "Cierres perdidos",
        "pipeline_id" => 1,
        "probability_of_close" => "lost",
        "order" => null,
        'created_at' => Carbon::now(),
      ],
    ]);

    PipelineStage::insert([
      [
        "name" => "Email enviado",
        "pipeline_id" => 2,
        "probability_of_close" => 20,
        "order" => 1,
        'created_at' => Carbon::now(),
      ],
      [
        "name" => "Campaña enviada",
        "pipeline_id" => 2,
        "probability_of_close" => 40,
        "order" => 2,
        'created_at' => Carbon::now(),
      ],
      [
        "name" => "Encuesta enviada",
        "pipeline_id" => 2,
        "probability_of_close" => 60,
        "order" => 3,
        'created_at' => Carbon::now(),
      ],
      [
        "name" => "Otro",
        "pipeline_id" => 2,
        "probability_of_close" => 80,
        "order" => 4,
        'created_at' => Carbon::now(),
      ]
    ]);
  }
}
