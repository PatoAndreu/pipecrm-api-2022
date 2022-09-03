<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\PipelineStage;

class DealFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $start_date = '2022-01-31 00:00:00';
    $end_date = '2022-12-30 00:00:00';

    return [
      "name" => "Negocio " . $this->faker->name(),
      "amount" => $this->faker->numberBetween($min = 150000, $max = 10000000),
      "priority" => $this->faker->randomElement(['low', 'medium', 'high']),
      "pipeline_id" => 1,
      "pipeline_stage_id" => PipelineStage::all()->random()->id,
      "owner_id" => User::all()->random()->id,
      "contact_id" => Contact::all()->random()->id,
      "close_date" => $this->faker->dateTimeBetween('-1 month', '+1 month'),

    ];
  }
}
