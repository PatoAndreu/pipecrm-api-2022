<?php

namespace Database\Seeders;

use App\Models\Deal;
use App\Models\Pipeline;
use App\Models\PipelineStage;
use Illuminate\Database\Seeder;

class DealSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Deal::factory(100)
      ->create()->each(function ($deal) {
        $deal->pipeline_id =  Pipeline::all()->random()->id;
        $deal->pipeline_stage_id =  PipelineStage::where('pipeline_id', $deal->pipeline_id)->get()->random()->id;
        $deal->save();
      });
  }
}
